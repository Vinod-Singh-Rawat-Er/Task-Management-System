<x-app-layout>
    <x-slot name="header">
        <div class="flex d-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users / Create') }}
            </h2>
            <a href="{{ route('users.index') }}" class="bg-white text-sm shadow-sm sm:rounded-lg text-slate px-3 py-3">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                    <div>
                            <label for="" class="text-lg font-medium">
                                Name
                            </label>
                            <div class="my-3">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name">
                                @error('name')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">
                                Email
                            </label>
                            <div class="my-3">
                                <input type="text" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name">
                                @error('email')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">
                                Password
                            </label>
                            <div class="my-3">
                                <input type="password" name="password" id="password" value="{{ old('password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter password">
                                @error('password')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">
                                Confirm Password
                            </label>
                            <div class="my-3">
                                <input type="password" name="confirm-password" id="confirm-password" value="{{ old('confirm-password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm password">
                                @error('password')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>
                            
                            <label for="" class="text-lg font-medium">
                                Roles
                            </label>
                            <div class="grid grid-cols-4">
                                @if($roles->isNotEmpty())
                                @foreach($roles as $role)
                                <div class="mt-3">
                                    <input type="checkbox" name="role[]" id="role_{{$role->id}}" class="rounded" value="{{ $role->name }}">
                                    <label for="role_{{$role->id}}">{{ $role->name}}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <x-primary-button class="mt-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
