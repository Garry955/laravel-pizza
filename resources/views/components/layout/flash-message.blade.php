@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false , 3000)" x-show="show" 
    class="fixed top-0 bg-secondary text-white px-48 py-3 left-1/2 -translate-x-1/2 z-10 shadow-md">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif