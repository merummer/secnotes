<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{Auth::user()->name}}, willkommen bei Ihren Notizen.</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="/notes" method="post">
                    @csrf
                    <div>
                        <label for="title">
                            {{__('Title')}}
                        </label>
                        <input type="text"
                               id="title"
                               name="title">
                    </div>
                    <div>
                        <label for="content">
                            {{__('Content')}}
                        </label>
                        <input type="text"
                               id="content"
                               name="content">
                    </div>
                    <div>
                        <button>{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach(Auth::user()->notes as $note)
                        <h2>{{$note->title}}</h2>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
