@if (session()->has('success'))
<div x-data="{show: true}"
    x-init="setTimeout(()=> show = false, 4000)"
    x-show="show"
    class="fixed bottom-3 right-3 py-2 bg-blue-500 text-white px-4">
    <p>{{ session('success')}}</p>
</div>
@endif
