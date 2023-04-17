<!-- ====== Navbar Section Start -->
<header x-data="{navbarOpen: false}"
    class=" bg-red-500">
    <div class="container mx-auto">
        <div class="relative -mx-4 flex items-center justify-between">
            {{-- Logo container --}}
            <div class="px-4 md:text-center">
                <a href="{{ route('home') }}" class="block py-5 text-5xl hover:text-white transition-all ease-in-out">
                    <i class="fa-solid fa-pizza-slice"></i>
                </a>
            </div>
            {{-- Navbar items container --}}
            <div class="flex justify-between px-4 md:w-full md:text-center">
                <x-layout.navbar-hamburger @click="navbarOpen = !navbarOpen" x-bind:class="navbarOpen && 'navbarTogglerActive'"></x-layout.navbar-hamburger>
                <nav :class="!navbarOpen && 'hidden' " id="navbarCollapse"
                    class="absolute right-4 top-full w-full max-w-[250px] py-5 px-6 rounded-b-lg shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none md:">
                    <ul class="block lg:flex flex-row-reverse">
                        @foreach ($navigationItems as $item)
                            @if(isset($item['fa-pikto']))
                                <i class="{{ $item['fa-pikto'] }} text-xl font-medium py-2 hover:text-white"></i>
                            @else
                                <x-layout.navbar-item :href="$item['href']">{{ $item['label'] }}</x-layout.navbar-item>    
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ====== Navbar Section End -->