<div class="border-solid border-black border-2 mb-8 rounded-lg relative">
    @if ($variant === 'simple')
        <a href="{{ route('product.show', [$product->id]) }}" class="p-5 block z-20">
            <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
                alt="">
            <div class="absolute w-1/2 right-0 top-8">
                <label class="bg-secondary pl-4 py-2 rounded-l-lg font-bold z-10 block">{{ $product->name }}</label>
                <label
                    class="text-white bg-price-label px-3 py-1 rounded-lg font-semibold -mt-4 ml-24 inline-block">{{ $product->price }}
                    Ft</label>
            </div>
        </a>
    @elseif($variant === 'checkout')
        <div class="inline-block">
            <a href="{{ route('product.show', [$product->id]) }}" class="p-5 block z-20">
                <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
                    alt="">
            </a>
        </div>
        <div class="inline-block align-top pl-10 pt-10 text-xl">
            <span class="block mt-2">Name: {{ $product->product->name }}</span>
            <span class="block mt-2">Category: {{ $product->product->category->name }}</span>
            <span class="block mt-2">Single Price: {{ $product->product->price }} Ft</span>
            <span class="block mt-2">Quantity: {{ $product->quantity }}</span>
            <span class="block mt-2">Total Price: {{ $product->quantity * $product->product->price }}</span>

        </div>
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="absolute right-10 bottom-8">
            @csrf
            <input type="number" id="quantity" name="quantity" min="0" max="100" step="1"
                value="{{ $product->quantity ?? 0 }}"
                class="border-form-stroke text-body-color placeholder-body-color focus:border-primary active:border-primary rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition disabled:cursor-default disabled:bg-[#F5F7FD]" />
            <button type="submit"
                class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white ">
                Update</button>
        </form>
    @elseif($variant === 'list')
        <a href="{{ route('product.show', [$product->id]) }}" class="p-5 block z-20">
            <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
                alt="">
            <div class="absolute w-1/2 right-0 top-8">
                <label class="text-2xl block mb-2">Name: {{ $product->name }}</label>
                <label class="text-2xl block mb-2">Single Price: {{ $product->price }}
                    Ft</label>
                <label class="text-2xl block mb-2">Quantity: {{ $quantity }}</label>
                <label class="text-2xl block mb-2 text-red-500">Total price: {{ $quantity * $product->price }} Ft</label>
            </div>
        </a>
    @endif
</div>
