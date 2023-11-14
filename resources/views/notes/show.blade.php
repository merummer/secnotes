@php use Illuminate\Support\Facades\Auth; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ Auth::user()->name }}, willkommen bei Ihren Notizen!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session()->has('success'))
            <div class="p-6 font-medium text-2xl text-green-500">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="mb-10 font-bold text-3xl">{{ $note->title }}</h1>
                <p>{{ $note->content }}</p>
            </div>
        </div>

    </div>
</x-app-layout>
