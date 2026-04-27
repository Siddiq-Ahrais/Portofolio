{{-- Shared form partial for project create/edit --}}
@props(['project' => null])

@php
    $isEdit = $project !== null;
@endphp

<div class="space-y-6">
    {{-- Title --}}
    <div>
        <x-input-label for="title" :value="__('Judul Proyek')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
            :value="old('title', $project?->title)" required autofocus placeholder="Contoh: Website E-Commerce" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    {{-- Description --}}
    <div>
        <x-input-label for="description" :value="__('Deskripsi')" />
        <textarea id="description" name="description" rows="5"
            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            required placeholder="Jelaskan tentang proyek ini...">{{ old('description', $project?->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    {{-- Image Upload --}}
    <div>
        <x-input-label for="image" :value="$isEdit ? __('Ganti Gambar (Opsional)') : __('Gambar Thumbnail')" />
        
        @if ($isEdit && $project->image_path)
            <div class="mt-2 mb-3">
                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" 
                    class="h-32 w-auto rounded-lg object-cover border border-gray-200 dark:border-gray-700">
            </div>
        @endif

        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"
            class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700
                dark:file:bg-indigo-900/50 dark:file:text-indigo-300
                hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900/70
                file:cursor-pointer file:transition"
            {{ !$isEdit ? 'required' : '' }}
            onchange="previewImage(event)">
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, PNG, WebP. Maksimal 2MB.</p>
        <x-input-error class="mt-2" :messages="$errors->get('image')" />

        {{-- Image Preview --}}
        <div id="imagePreview" class="mt-3 hidden">
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Preview:</p>
            <img id="previewImg" src="#" alt="Preview" class="h-32 w-auto rounded-lg object-cover border border-gray-200 dark:border-gray-700">
        </div>
    </div>

    {{-- Tech Stack --}}
    <div>
        <x-input-label for="tech_stack" :value="__('Tech Stack')" />
        <x-text-input id="tech_stack" name="tech_stack" type="text" class="mt-1 block w-full"
            :value="old('tech_stack', $project?->tech_stack ? implode(', ', $project->tech_stack) : '')" 
            placeholder="Contoh: Laravel, React, TailwindCSS" />
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pisahkan dengan koma.</p>
        <x-input-error class="mt-2" :messages="$errors->get('tech_stack')" />
    </div>

    {{-- Repository Link --}}
    <div>
        <x-input-label for="repository_link" :value="__('Link Repository / Live Demo')" />
        <x-text-input id="repository_link" name="repository_link" type="url" class="mt-1 block w-full"
            :value="old('repository_link', $project?->repository_link)" 
            placeholder="https://github.com/username/project" />
        <x-input-error class="mt-2" :messages="$errors->get('repository_link')" />
    </div>

    {{-- Submit Button --}}
    <div class="flex items-center justify-end gap-4">
        <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-lg font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
            Batal
        </a>
        <x-primary-button>
            {{ $isEdit ? 'Perbarui Proyek' : 'Simpan Proyek' }}
        </x-primary-button>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
