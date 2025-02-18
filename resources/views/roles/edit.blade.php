<x-app-layout>
    <x-slot name="header">
        <div class="flex d-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Roles / Edit') }}
            </h2>
            <a href="{{ route('roles.index') }}" class="bg-white text-sm shadow-sm sm:rounded-lg text-slate px-3 py-3">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                    <div>
                            <label for="" class="text-lg font-medium">
                                Name
                            </label>
                            <div class="my-3">
                                <input type="text" name="name" id="name" value="{{ $role->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter name">
                                @error('name')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-4">
                                @if($permissions->isNotEmpty())
                                @foreach($permissions as $permission)
                                <div class="mt-3">
                                    <input {{ ($hasPermissions->contains($permission->name)) ? 'checked' : ''}} type="checkbox" name="permission[]" id="permission_{{$permission->id}}" class="rounded" value="{{ $permission->name }}">
                                    <label for="permission_{{$permission->id}}">{{ $permission->name}}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <x-primary-button class="mt-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
