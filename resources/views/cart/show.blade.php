<x-layout.app>
    <div class="container px-8 mx-auto pt-[120px]">
        <h1>Cart</h1>
        <span>{{ $cartTotal }} Items total</span>
        <div class="bg-white p-10">
            @forelse ($cartItems as $item)
                <div class="w-full block">
                    <x-product.card :product="$item" variant="checkout" />
                </div>
            @empty
                <h3>Your cart is currently empty..</h3>
            @endforelse
            <div class="flex flex-row-reverse">
                <form action="{{ route('cart.delete', $cartID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-primary inline-flex items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">Delete
                        Order</button>
                </form>
                <span class="text-2xl px-8 text-red-500 font-bold align-middle leading-10">
                    TotalPrice: {{ $totalPrice }} Ft
                </span>
            </div>
        </div>
        <div class="container mx-auto pt-10 bg-white border-t-2 border-t-black">
            <h2 class="text-7xl">Details</h1>
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative mx-auto overflow-hidden rounded-lg py-16 px-10 sm:px-12 md:px-[60px]">
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                                <input type="hidden" name="cartItems" value="{{ $cartItems }}">
                                <input type="hidden" name="cartID" value="{{ $cartID }}">
                                <div class="mb-6">
                                    <input type="text" placeholder="Name" name="name"
                                        value="{{ auth()->user() ? auth()->user()->name : '' }}"
                                        class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                                    <div class="error text-red-500 border-b-red-500 mt-2">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <input type="email" placeholder="Email" name="email"
                                        value="{{ auth()->user() ? auth()->user()->email : '' }}"
                                        class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                                    <div class="error text-red-500 border-b-red-500 mt-2">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <input type="phone" placeholder="Phone number" name="phone"
                                        value="{{ auth()->user() ? auth()->user()->phone : '' }}"
                                        class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                                    <div class="error text-red-500 border-b-red-500 mt-2">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <input type="submit" value="Send Order"
                                        class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition hover:bg-opacity-90" />
                                </div>
                            </form>
                            <p class="text-base text-[#adadad]">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-primary hover:underline">
                                    Sign In
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</x-layout.app>
