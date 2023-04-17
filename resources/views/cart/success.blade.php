<x-layout.app>
    <div class="py-20 px-10 bg-white container mx-auto">
        <h1 class="text-5xl mb-10">Thank you for your order, we've sent an e-mail to {{ $order->customer_email }} with your
            order details.</h1>
        <label class="mb-3 block p-4 text-2xl border-b-2 border-b-black">Name: {{ $order->customer_name }}</label>
        <label class="mb-3 block p-4 text-2xl border-b-2 border-b-black">Email: {{ $order->customer_email }}</label>
        <label class="mb-3 block p-4 text-2xl border-b-2 border-b-black">Phone: {{ $order->customer_phone }}</label>
        <label class="mb-3 block p-4 text-2xl border-b-2 border-b-black">Time: {{ $order->created_at }}</label>
        <label class="mb-3 block p-4 text-2xl border-b-2 border-b-black">total Price: {{ $order->order_total }}</label>
        <div class="mt-4">
            @foreach ($cartItems as $item)
                <div class="holder">
                    <x-product.card :product="$item->product" :quantity="$item->quantity" variant="list" />
                </div>
            @endforeach
        </div>
        <div class="mt-4 text-right">
            <a
                href="/" class="bg-primary inline-flex items-center justify-center rounded-md py-3 px-10 text-center text-base font-normal text-white ">Back
                to shopping</a>
        </div>

    </div>
</x-layout.app>
