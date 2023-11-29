@php use App\Models\Note;use App\Models\User;use Illuminate\Support\Facades\Auth; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
                <div class="p-6 font-medium text-2xl text-green-500">
                    <p>{{session('success')}}</p>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach(User::all() as $users)
                        <h2>{{$users->email}}</h2>
                    @endforeach
                    <form action="/users" method="post">
                        @csrf
                        <div>
                            @error('name')
                            <div class="text-2xl text-red-500 font-medium">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="name">
                                {{__('Name')}}
                            </label>
                            <input type="text"
                                   id="name"
                                   value="{{old('name')}}"
                                   name="name">
                        </div>

                        <div>
                            @error('email')
                            <div class="text-2xl text-red-500 font-medium">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="email">
                                {{__('EMail')}}
                            </label>
                            <input type="text"
                                   id="email"
                                   value="{{old('email')}}"
                                   name="email">
                        </div>

                        <div>
                            @error('password')
                            <div class="text-2xl text-red-500 font-medium">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="password">
                                {{__('Passwort')}}
                            </label>
                            <input type="text"
                                   id="password"
                                   value="{{old('password')}}"
                                   name="password">
                        </div>
                        <div>
                            <x-primary-button>
                                {{__('Save')}}
                            </x-primary-button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
