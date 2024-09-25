<x-layout>

    <x-navbar />

    <div class="body-overlay"></div>

    <div class="flex h-screen flex-col items-center justify-center bg-gray-100 px-6 py-12 lg:px-8">
        <div class="w-full rounded-lg bg-white shadow sm:max-w-md">
            <div class="space-y-4 p-6 sm:p-8 md:space-y-6">

                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Forgot
                        Password</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form method="POST" class="space-y-6" action="/forgot-password">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" value="{{ @old('email') }}"
                                    class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#f00c93] sm:text-sm sm:leading-6">
                                <x-form-error name="email" />
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-[#f00c93] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reset Password</button>
                        </div>
                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                        Return to login ?
                        <a href="{{ route('login') }}"
                            class="font-semibold leading-6 text-[#f00c93] hover:text-[#ed6fb7]">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>
