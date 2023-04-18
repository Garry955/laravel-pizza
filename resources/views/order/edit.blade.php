<x-layout.admin>
    <h1 class="text-4xl mt-10">Edit Order {{ $order->id }} - {{ $order->customer_name }}</h1>
    <form action="{{ route('order.update', $order->id) }}" method="POST" class="mt-10">
        @csrf
        @method('patch')
        <img src="{{ $order->image ? asset($order->image) : asset('/storage/images/pizza-default.png') }}"
            alt="" class="inline-block">
        <div class="mb-6 mt-6">
            <label class="font-semibold">Customer Name:</label>
            <input type="text" placeholder="Name" name="customer_name" value="{{ $order->customer_name }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('customer_name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Customer Email:</label>
            <input type="text" placeholder="Email" name="customer_email" value="{{ $order->customer_email }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('customer_email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Customer Phone:</label>
            <input type="text" placeholder="Customer Phone" name="customer_phone" value="{{ $order->customer_phone }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('customer_phone')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Total Price:</label>
            <input type="int" placeholder="Customer Phone" name="order_total" value="{{ $order->order_total }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('order_total')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <input type="submit" name="submit" value="Update"
                class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
            
        </div>
    </form>
</x-layout.admin>
