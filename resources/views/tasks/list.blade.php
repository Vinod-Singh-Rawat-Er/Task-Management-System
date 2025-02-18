<x-app-layout>
    <x-slot name="header">
        <div class="flex d-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Tasks') }}
            </h2>
            <a href="{{ route('tasks.create') }}" class="bg-white text-sm shadow-sm sm:rounded-lg text-slate px-3 py-3">
                Create
            </a>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-white text-black">
                    <th class="px-6 py-6 text-left">##</th>
                    <th class="px-6 py-6 text-left">Title</th>
                    <th class="px-6 py-6 text-left">Description</th>
                    <th class="px-6 py-6 text-left">Due Date</th>
                    <th class="px-6 py-6 text-left" width="20%">Action</th>
                </thead>
                <tbody class="bg-white text-black">
                    @if($tasks->isNotEmpty()) 
                    @foreach($tasks as $key=>$value)
                    <tr>
                        <td class="px-6 py-6 text-left">{{$key+1}}</td>
                        <td class="px-6 py-6 text-left">{{ $value->title }}</td>
                        <td class="px-6 py-6 text-left">{{ $value->description }}</td>
                        <td class="px-6 py-6 text-left">
                            {{ \Carbon\Carbon::parse($value->due_date)->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            @can('edit tasks')
                            <a href="{{ route('tasks.edit', $value->id) }}" class="bg-green-600 text-sm rounded-md text-white px-3 py-2">
                                Edit
                            </a>
                            @endcan
                            @can('delete tasks')
                            <a href="javascript:void(0);" onclick="deleteTask({{$value->id}})" class="bg-red-600 text-sm rounded-md text-white px-3 py-2">
                                Delete
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="4">No Tasks Available</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="my-3">
            {{ $tasks->links()}}

            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deleteTask(id) {
                if(confirm("Are you sure you want to delete?")){
                    $.ajax({
                        url: "{{ route('tasks.delete')}}",
                        type: 'delete',
                        data: {id: id},
                        datatType: 'json',
                        headers: {
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function(response){
                            window.location.href = "{{ route('tasks.index')}}";
                        }
                    })
                }
            }
        </script>
    </x-slot>
</x-app-layout>
