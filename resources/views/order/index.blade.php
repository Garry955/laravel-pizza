<x-layout.admin>
    <h1 class="text-3xl mt-10">Orders</h1>
    <table id="table" class="mt-10 p-10 bg-white w-full align-top text-left">
        <tr class="text-left">
            <th class="text-left">ID</th>
            <th class="text-left">Customer Name</th>
            <th class="text-left">Customer Email</th>
            <th class="text-left">Customer Phone</th>
            <th class="text-left">Order_total</th>
            <th class="text-left">Date</th>
            <th>Options</th>
        </tr>
        @foreach ($orders as $order)
            <tr class="py-3 border-b-black border-b-2 row">
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_email }}</td>
                <td>{{ $order->customer_phone }}</td>
                <td>{{ $order->order_total }} Ft</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('order.edit', $order->id) }}"
                        class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                        Update Order</a>
                    <form action="{{ route('order.delete', $order->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-primary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                            Delete Order</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    <div id="pagination" class="mt-6 p-4 block max-h-12 mb-24 container mx-auto">
        {{ $orders->links() }}
    </div>
</x-layout.admin>
