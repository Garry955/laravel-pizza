<x-layout.admin>
    <h1 class="text-4xl mt-10">Edit Product {{ $product->id }} - {{ $product->name }}</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST" class="mt-10">
        @csrf
        <img src="{{ $product->image ? asset($product->image) : asset('/storage/images/pizza-default.png') }}"
            alt="" class="inline-block">
        <div class="mb-6 mt-6">
            <label class="font-semibold">Name:</label>
            <input type="text" placeholder="Name" name="name" value="{{ $product->name }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Price:</label>
            <input type="text" placeholder="Price" name="price" value="{{ $product->price }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Choose a category:</label>
            <select name="category" id="category">
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="mb-6">
            <input type="submit" name="submit" value="Update"
                class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">
            
        </div>
    </form>
</x-layout.admin>
