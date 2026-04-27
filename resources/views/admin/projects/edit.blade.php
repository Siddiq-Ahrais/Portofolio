<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('admin.projects.index') }}" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition mr-3">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Proyek: ') }} {{ $project->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.projects._form', ['project' => $project])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
