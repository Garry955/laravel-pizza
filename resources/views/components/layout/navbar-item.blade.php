<li x-data="{ open: false }" @mouseleave="open = false" @mouseover="open = true"
    class="bg-inherit inline-block w-auto px-10 relative">
    <a href="{{ $href }}" class="text-xl font-medium md:ml-0 text-dark py-2 hover:text-white lg:inline-flex">
        {{ $slot }}
    </a>
    @if (isset($items))
        <nav x-show="open" @mouseleave="open = false" @mouseover="open = true"
            class="dropdown absolute z-50 bg-primary w-auto right-0 rounded-b-lg mt-0 pt-6">
            @foreach ($items as $category)
<li class="bg-inherit inline-block w-auto border-t-2 border-t-black hover:bg-red-500">
    <a href="/?category={{ $category['id'] }}" class="w-full h-full px-10 leading-10 py-3 block">
        {{ $category['name'] }}</a>
</li>
@endforeach
</nav>
@endif

</li>
