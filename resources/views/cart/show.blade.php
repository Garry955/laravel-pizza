<x-layout.app>
    <div class="container px-8 mx-auto pt-[120px]">
        <h1>Cart</h1>
        <span>{{ $cartTotal }} Items total</span>
        <div class="bg-white p-10">
            @forelse ($cartItems as $item)
            <div class="w-full block">
                {{ $item }}
            </div>
            @empty
                <h3>Your cart is currently empty..</h3>
            @endforelse
        </div>
    </div>
</x-layout.app>