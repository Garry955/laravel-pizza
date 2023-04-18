<x-layout.admin>
    <h1 class="text-4xl mt-10">Edit Product {{ $user->id }} - {{ $user->name }}</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST" class="mt-10">
        @csrf
        @method('patch')
        <img src="{{ $user->image ? asset($user->image) : asset('/storage/images/pizza-default.png') }}" alt=""
            class="inline-block">
        <div class="mb-6 mt-6">
            <label class="font-semibold">Name:</label>
            <input type="text" placeholder="Name" name="name" value="{{ $user->name }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Email:</label>
            <input type="text" placeholder="Email" name="email" value="{{ $user->email }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Phone:</label>
            <input type="text" placeholder="Phone" name="phone" value="{{ $user->phone }}"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
            <div class="error text-red-500 border-b-red-500 mt-2">
                @error('phone')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Admin:</label>
            <select name="admin" id="admin">
                    <option value="0">No</option>
                    <option value="1" {{ $user->is_admin ? 'selected': '' }}>Yes</option>
            </select>
        </div>
        <div class="mb-6">
            <input type="submit" name="submit" value="Update"
                class="bg-secondary inline-block items-center justify-center rounded-md py-2 px-10 text-center text-base font-normal text-white">

        </div>
    </form>
</x-layout.admin>
