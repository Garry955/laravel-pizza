<x-layout.admin>
    <h1 class="text-3xl mt-10 ">Products</h1>
    <a href="{{ route('product.create') }}"
        class="mt-6 bg-primary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">+ Add
        new product</a>
    <table id="table" class="mt-10 p-10 bg-white w-full align-top text-left">
        <tr class="text-left">
            <th class="text-left">Image</th>
            <th class="text-left">ID</th>
            <th class="text-left">Name</th>
            <th class="text-left">Category ID</th>
            <th class="text-left">Price</th>
            <th class="text-left">Created</th>
            <th>Options</th>
        </tr>
        @foreach ($products as $product)
            <tr class="py-3 border-b-black border-b-2 row">
                <td>
                    <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
                        alt="" style="height: 30px" class="inline-block">
                </td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}"
                        class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                        Update Product</a>
                    <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-primary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
                            Delete Product</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
    <div id="pagination" class="mt-6 p-4 block max-h-12 mb-24 container mx-auto">
        {{ $products->links() }}
    </div>
</x-layout.admin>
