<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-white text-black">
                    <th class="px-6 py-6 text-left">##</th>
                    <th class="px-6 py-6 text-left">Title</th>
                    <th width="35%" class="px-6 py-6 text-left">Description</th>
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
                            @if($value->status)
                                @php
                                    $file_path = $value->file;
                                @endphp
                                <span class="text-green-500">Completed</span><br />
                                <img src="{{ asset('storage/' . $file_path) }}" width="40px" height="40px" onclick="window.open(this.src, '_blank');"/>
                            @else
                            {{ \Carbon\Carbon::parse($value->due_date)->format('d M, Y') }}
                            @endif
                        </td>
                        <td class="px-6 py-3 text-left">
                            
                            <!-- <a href="{{ route('tasks.edit', $value->id) }}" class="bg-green-600 text-sm rounded-md text-white px-3 py-2">
                                Edit
                            </a> -->
                            

                            <label class="inline-flex items-center me-5 cursor-pointer">
                            <input  type="checkbox" name="mark_as_done" class="sr-only peer mark" onclick="$('#fileInput').click();" {{ ($value->status == 1) ? 'checked disabled' : ''}}>
                            <input type="file" id="fileInput" data-id="{{ $value->id }}" name="file" class="hidden" accept="*/*">
                            <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4  rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-green-600 dark:peer-checked:bg-green-600"></div>
                            <span class="ms-3 text-sm font-medium text-white dark:text-black">Complete</span>
                            </label>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="5" class="text-center">No Tasks Available!</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="my-3">
            {{ $tasks->links()}}

            </div>
        </div>

    </div>

    <x-slot name="script">
        <script>
            
            $(document).ready(function () {

                $("#fileInput").change(function () {
                    var file = this.files[0]; // Get selected file
                    
                    var id = $(this).data('id');
                    if (file) {
                        var formData = new FormData();
                        formData.append("file", file);
                        formData.append("id", id);

                        $.ajax({
                            url: "{{ route('tasks.markasdone')}}", 
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                            'x-csrf-token' : '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                alert("File uploaded successfully!");
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                alert("Error uploading file: " + error);
                            }
                        });
                    }
                });
            });


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
