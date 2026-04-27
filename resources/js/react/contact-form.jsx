import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';

function ContactForm() {
    const [formData, setFormData] = useState({
        sender_name: '',
        sender_email: '',
        content: '',
    });
    const [status, setStatus] = useState('idle'); // idle, sending, success, error
    const [errors, setErrors] = useState({});
    const [successMessage, setSuccessMessage] = useState('');

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData((prev) => ({ ...prev, [name]: value }));
        // Clear field error when user starts typing
        if (errors[name]) {
            setErrors((prev) => {
                const newErrors = { ...prev };
                delete newErrors[name];
                return newErrors;
            });
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setStatus('sending');
        setErrors({});

        try {
            // Get CSRF token from meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            const response = await fetch('/api/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    ...(csrfToken ? { 'X-CSRF-TOKEN': csrfToken } : {}),
                },
                body: JSON.stringify(formData),
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    setErrors(data.errors);
                    setStatus('error');
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan.');
                }
                return;
            }

            setStatus('success');
            setSuccessMessage(data.message);
            setFormData({ sender_name: '', sender_email: '', content: '' });

            // Reset success message after 5 seconds
            setTimeout(() => {
                setStatus('idle');
                setSuccessMessage('');
            }, 5000);
        } catch (err) {
            setStatus('error');
            setErrors({ general: [err.message || 'Gagal mengirim pesan. Silakan coba lagi.'] });
        }
    };

    return (
        <form onSubmit={handleSubmit} className="space-y-6">
            {/* Success Message */}
            {status === 'success' && (
                <div className="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-700 text-emerald-700 dark:text-emerald-300 px-4 py-3 rounded-lg flex items-center">
                    <svg className="w-5 h-5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>{successMessage}</span>
                </div>
            )}

            {/* General Error */}
            {errors.general && (
                <div className="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg">
                    <span>{errors.general[0]}</span>
                </div>
            )}

            {/* Name */}
            <div>
                <label htmlFor="sender_name" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Nama
                </label>
                <input
                    type="text"
                    id="sender_name"
                    name="sender_name"
                    value={formData.sender_name}
                    onChange={handleChange}
                    required
                    className={`block w-full rounded-lg border ${
                        errors.sender_name
                            ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                            : 'border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500'
                    } dark:bg-gray-900 dark:text-gray-300 shadow-sm px-4 py-2.5 text-sm transition`}
                    placeholder="Nama lengkap Anda"
                />
                {errors.sender_name && (
                    <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.sender_name[0]}</p>
                )}
            </div>

            {/* Email */}
            <div>
                <label htmlFor="sender_email" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    id="sender_email"
                    name="sender_email"
                    value={formData.sender_email}
                    onChange={handleChange}
                    required
                    className={`block w-full rounded-lg border ${
                        errors.sender_email
                            ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                            : 'border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500'
                    } dark:bg-gray-900 dark:text-gray-300 shadow-sm px-4 py-2.5 text-sm transition`}
                    placeholder="email@contoh.com"
                />
                {errors.sender_email && (
                    <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.sender_email[0]}</p>
                )}
            </div>

            {/* Message */}
            <div>
                <label htmlFor="content" className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Pesan
                </label>
                <textarea
                    id="content"
                    name="content"
                    rows="5"
                    value={formData.content}
                    onChange={handleChange}
                    required
                    className={`block w-full rounded-lg border ${
                        errors.content
                            ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                            : 'border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500'
                    } dark:bg-gray-900 dark:text-gray-300 shadow-sm px-4 py-2.5 text-sm transition resize-y`}
                    placeholder="Tulis pesan Anda di sini..."
                ></textarea>
                {errors.content && (
                    <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.content[0]}</p>
                )}
            </div>

            {/* Submit Button */}
            <div>
                <button
                    type="submit"
                    disabled={status === 'sending'}
                    className="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-60 disabled:cursor-not-allowed transition-all duration-200"
                >
                    {status === 'sending' ? (
                        <>
                            <svg className="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                                <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim...
                        </>
                    ) : (
                        <>
                            <svg className="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            Kirim Pesan
                        </>
                    )}
                </button>
            </div>
        </form>
    );
}

// Mount the component
const container = document.getElementById('contact-form');
if (container) {
    createRoot(container).render(<ContactForm />);
}
