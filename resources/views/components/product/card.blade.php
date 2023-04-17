<div class="border-solid border-amber-800 border-2 mb-8 rounded-lg hover:scale-110 transition-all relative">
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
</div>
