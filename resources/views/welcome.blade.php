<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Portfolio — Showcase proyek dan karya terbaik saya.">

    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/react/project-filter.jsx', 'resources/js/react/contact-form.jsx'])

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Custom gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animated gradient background */
        .hero-gradient {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #1e1b4b, #172554);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating dots pattern */
        .dots-pattern {
            background-image: radial-gradient(rgba(255,255,255,0.07) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        /* Glow effect */
        .glow {
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.15);
        }

        /* Fade in animation */
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up-delay-1 { animation-delay: 0.2s; }
        .fade-in-up-delay-2 { animation-delay: 0.4s; }
        .fade-in-up-delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body class="bg-gray-950 text-gray-100 antialiased">

    {{-- ═══════════════════════════════════════════ --}}
    {{-- NAVIGATION --}}
    {{-- ═══════════════════════════════════════════ --}}
    <nav class="fixed top-0 w-full z-50 bg-gray-950/80 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-xl font-bold tracking-tight">
                <span class="gradient-text">Portfolio</span>
            </a>
            <div class="hidden sm:flex items-center space-x-8">
                <a href="#home" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Home</a>
                <a href="#projects" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Proyek</a>
                <a href="#contact" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Kontak</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg font-medium transition-colors duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Login</a>
                @endauth
            </div>
            {{-- Mobile hamburger --}}
            <button id="mobile-menu-btn" class="sm:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden sm:hidden border-t border-white/5 bg-gray-950/95 backdrop-blur-xl">
            <div class="px-6 py-4 space-y-3">
                <a href="#home" class="block text-sm text-gray-400 hover:text-white transition">Home</a>
                <a href="#projects" class="block text-sm text-gray-400 hover:text-white transition">Proyek</a>
                <a href="#contact" class="block text-sm text-gray-400 hover:text-white transition">Kontak</a>
            </div>
        </div>
    </nav>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- HERO SECTION --}}
    {{-- ═══════════════════════════════════════════ --}}
    <section id="home" class="hero-gradient dots-pattern relative min-h-screen flex items-center justify-center overflow-hidden">
        {{-- Decorative blobs --}}
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-6 text-center">
            <div class="fade-in-up">
                <span class="inline-block px-4 py-1.5 bg-indigo-500/10 border border-indigo-500/20 rounded-full text-indigo-400 text-xs font-semibold uppercase tracking-widest mb-6">
                    Welcome to My Portfolio
                </span>
            </div>

            <h1 class="fade-in-up fade-in-up-delay-1 text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6">
                Membangun Solusi
                <br>
                <span class="gradient-text">Digital Modern</span>
            </h1>

            <p class="fade-in-up fade-in-up-delay-2 text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Saya seorang developer yang passionate dalam membuat website dan aplikasi web yang indah, fungsional, dan performant.
            </p>

            <div class="fade-in-up fade-in-up-delay-3 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#projects" class="px-8 py-3.5 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold text-sm transition-all duration-200 shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5">
                    Lihat Proyek Saya
                </a>
                <a href="#contact" class="px-8 py-3.5 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-xl font-semibold text-sm transition-all duration-200 hover:-translate-y-0.5">
                    Hubungi Saya
                </a>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- PROJECTS SECTION (React Component) --}}
    {{-- ═══════════════════════════════════════════ --}}
    <section id="projects" class="py-24 bg-gray-900/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-indigo-400 text-sm font-semibold uppercase tracking-widest">Portfolio</span>
                <h2 class="text-3xl sm:text-4xl font-bold mt-3 mb-4">Proyek Saya</h2>
                <p class="text-gray-400 max-w-xl mx-auto">Koleksi proyek yang telah saya kerjakan. Gunakan filter untuk menjelajahi berdasarkan teknologi.</p>
            </div>

            {{-- React ProjectFilter mounts here --}}
            <div id="project-filter"></div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- CONTACT SECTION (React Component) --}}
    {{-- ═══════════════════════════════════════════ --}}
    <section id="contact" class="py-24 bg-gray-950">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                {{-- Left column - Info --}}
                <div>
                    <span class="text-indigo-400 text-sm font-semibold uppercase tracking-widest">Kontak</span>
                    <h2 class="text-3xl sm:text-4xl font-bold mt-3 mb-4">Mari Berkolaborasi</h2>
                    <p class="text-gray-400 mb-8 leading-relaxed">
                        Punya ide proyek menarik? Ingin berkolaborasi? Atau sekadar menyapa? Jangan ragu untuk mengirimkan pesan!
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="text-gray-200">hello@portfolio.com</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Lokasi</p>
                                <p class="text-gray-200">Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right column - React ContactForm --}}
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 sm:p-8 glow">
                    <div id="contact-form"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════ --}}
    {{-- FOOTER --}}
    {{-- ═══════════════════════════════════════════ --}}
    <footer class="border-t border-white/5 py-8 bg-gray-950">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Portfolio. All rights reserved.</p>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-500 hover:text-gray-300 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-300 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>
    </footer>

    {{-- Mobile menu toggle --}}
    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });
    </script>
</body>
</html>
