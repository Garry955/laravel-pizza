<x-layout.app>
    <section class="bg-[#F4F7FF] py-[120px]">
        <div class="container mx-auto mt-40">
            <h1 class="text-7xl">Registration</h1>
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div
                        class="relative mx-auto overflow-hidden rounded-lg py-16 px-10 sm:px-12 md:px-[60px]">
                        <form action="{{ route('auth.store') }}" method="POST">
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
                                <input type="submit" value="Register"
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
    </section>
</x-layout.app>
