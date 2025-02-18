<x-app-layout>
    <x-slot name="header">
        <div class="flex d-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tasks / Edit') }}
            </h2>
            <a href="{{ route('tasks.index') }}" class="bg-white text-sm shadow-sm sm:rounded-lg text-slate px-3 py-3">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tasks.update', $task->id) }}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="text-lg font-medium">
                                Title
                            </label>
                            <div class="my-3">
                                <input type="text" name="title" id="title" value="{{ $task->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title">
                                @error('title')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="due_date" class="text-lg font-medium">
                                Due Date
                            </label>
                            <div class="my-3">
                                <input type="text" id="due_date" name="due_date" value="{{ $task->due_date }}" class="due_date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Due Date">
                                @error('due_date')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="due_date" class="text-lg font-medium">
                                Assign To
                            </label>
                            <div class="my-3">
                                <select id="assigned_user" name="assigned_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose...</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ ($task->assigned_user == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('assigned_user')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="text-lg font-medium">
                                Description
                            </label>
                            <div class="my-3">
                                <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter description">
                                    {{ $task->description}}
                                </textarea>
                                @error('description')
                                    <p class="text-red"> {{ $message }}</p>
                                @enderror
                            </div>
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
    <x-slot name="script">
        <script>
            // Initialize Flatpickr with DateTime functionality
            flatpickr(".due_date", {
                enableTime: false, 
                dateFormat: "Y-m-d",
                minDate: new Date() 
            });
        </script>
    </x-slot>
</x-app-layout>
