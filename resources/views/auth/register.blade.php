<x-layout>
    <x-navbar />
    <div class="body-overlay"></div>
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100">
        <div class="mt-4 rounded-lg bg-white px-8 py-6 text-left shadow-lg">
            <h3 class="text-center text-2xl font-bold">Create an account</h3>
            <form method="POST" class="mt-4" action="/register">
                @csrf
                <div class="grid grid-cols-1 gap-x-16 gap-y-8 sm:grid-cols-4">
                    <div class="sm:col-span-6">
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input placeholder="First Name" id="first_name" type="text"
                                value="{{ old('first_name') }}" name="first_name"></x-form-input>
                            <x-form-error name="first_name" />
                        </div>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-1 gap-x-16 gap-y-8 sm:grid-cols-4">
                    <div class="sm:col-span-6">
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input placeholder="Last Name" id="last_name" type="text"
                                value="{{ old('last_name') }}" name="last_name"></x-form-input>
                            <x-form-error name="last_name" />
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                    <div class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input placeholder="Email" type="email" id="email" value="{{ old('email') }}"
                                name="email"></x-form-input>
                            <x-form-error name="email" />
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                    <div class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" placeholder="Password" type="password"
                                name="password"></x-form-input>
                            <x-form-error name="password" />
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                    <div class="sm:col-span-4">
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password_confirmation" placeholder="Confirm Password" type="password"
                                name="password_confirmation"></x-form-input>
                            <x-form-error name="password_confirmation" />
                        </div>
                    </div>
                </div>

                {{-- <button
                    class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    type="submit">
                    Register
                </button> --}}

                <button type="submit"
                    class="text-md mt-6 flex w-full justify-center rounded-md bg-[#f00c93] px-3 py-1.5 font-semibold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                    an account</button>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Already have an account ?
                    <a href="{{ route('login') }}"
                        class="font-semibold leading-6 text-[#f00c93] hover:text-[#ed6fb7]">Login here</a>
                </p>

            </form>
        </div>
    </div>
    <x-footer />
</x-layout>
