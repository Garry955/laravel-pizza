<x-layout.admin>
    <h1 class="text-4xl my-10">Create Product</h1>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <input type="text" placeholder="Name" name="name"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <input type="text" placeholder="Price" name="price"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Choose a category:</label>
            <select name="category_id" id="category">
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="mb-10">
            <input type="submit" value="Create"
                class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition hover:bg-opacity-90" />
        </div>
    </form>
</x-layout.admin>
