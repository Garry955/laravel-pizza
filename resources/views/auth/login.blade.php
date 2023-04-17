<x-layout.app>

    <section class="bg-[#F4F7FF] pt-[120px]">
        <div class="container mx-auto mt-40">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div
                        class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg py-16 px-10 text-center sm:px-12 md:px-[60px]">
                        <form action="{{ route('authenticate') }}">
                            @csrf
                            <div class="mb-6">
                                <input type="text" placeholder="Email" name="email"
                                    class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="error text-red-500 border-b-red-500 mt-2">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-6">
                                <input type="password" placeholder="Password" name="password"
                                    class="bordder-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none" />
                            </div>
                            <div class="mb-10">
                                <input type="submit" value="Log In"
                                    class="bordder-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition hover:bg-opacity-90" />
                            </div>
                        </form>
                        <p class="text-base text-[#adadad]">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-primary hover:underline">
                                Sign Up
                            </a>
                        </p>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.app>
