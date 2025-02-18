@if(Session::has('success'))
<div class="bg-green border-green-600 mb-3 rounded-sm font-medium text-sm text-green-600 dark:text-green-500">
    {{ Session::get('success')}}
</div>
@endif
@if(Session::has('error'))
<div class="bg-red border-red-600 mb-3 rounded-sm font-medium text-sm text-red-600 dark:text-red-500">
    {{ Session::get('error')}}
</div>
@endif