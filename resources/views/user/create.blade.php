<x-layout.admin>
    <h1 class="text-4xl mt-10">Create new user</h1>
    <form action="{{ route('user.store') }}" method="POST" class="mt-10">
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
            <input type="email" placeholder="Email" name="email"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                <div class="error text-red-500 border-b-red-500 mt-2">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
        </div>
        <div class="mb-6">
            <input type="phone" placeholder="Phone number (Optional)" name="phone"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
        </div>
        <div class="mb-6 mt-6">
            <label class="font-semibold">Admin:</label>
            <select name="admin" id="admin">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
            </select>
        </div>
        <div class="mb-6">
            <input type="password" placeholder="Password" name="password"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
        </div>
        <div class="mb-6">
            <input type="password" placeholder="Password confirmation" name="password_confirmation"
                class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                <div class="error text-red-500 border-b-red-500 mt-2">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
        </div>
        <div class="mb-10">
            <input type="submit" value="Create"
                class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition hover:bg-opacity-90" />
        </div>
    </form>
</x-layout.admin>
