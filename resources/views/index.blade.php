<x-layout.app>
    <x-home.hero background='pizza-hero.jpg'/>
    {{-- Products list section --}}
    <div id="products" class="md:flex md:flex-wrap md:justify-evenly container m-auto my-16">
        @if($categoryId)
            <div class="my-10 w-full block ">
                <h2 class="text-4xl">Category: {{ $categoryName }}</h2>
            </div>
        @endif
        @forelse ($products as $product)
            <x-product.card :product="$product"/>
        @empty
            <h1>No products yet..</h1>
        @endforelse
    </div>
    <div id="pagination" class="my-6 p-4 block max-h-12">
        {{ $products->links() }}
    </div>
</x-layout.app>
