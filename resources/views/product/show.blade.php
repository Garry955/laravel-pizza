<x-layout.app>
    <div class="container m-auto pt-[120px]">
        <div class="flex flex-wrap">
            <div class="w-full flex">
                <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
                    alt="">
                <div class="ml-10 mt-10">
                    <span class="block">Name {{ $product->name }}</span>
                    <span class="block">Category: <b>{{ $product->Category->name }}</b></span>
                    <p class="font-semibold pt-8">Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Pariatur possimus, fuga magnam odio iure reprehenderit qui, tempore nesciunt doloribus
                        sapiente praesentium aspernatur, rem recusandae itaque blanditiis excepturi quasi facere ex!
                    </p>
                    <span class="block text-right text-red-500 font-semibold mt-5 text-3xl">Price: {{ $product->price }} Ft</span>
                    <div class="controls mt-12 float-right">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="number" id="quantity" name="quantity" min="0" max="100"
                                step="1" value="{{ $quantity ?? 0 }}"
                                class="border-form-stroke text-body-color placeholder-body-color focus:border-primary active:border-primary rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition disabled:cursor-default disabled:bg-[#F5F7FD]" />
                            <button type="submit"
                                class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white ">
                                Update cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
