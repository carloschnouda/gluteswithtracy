<x-layout>

    <x-navbar />

    <div class="body-overlay"></div>

    <div class="flex h-screen flex-col items-center justify-center bg-gray-100 px-6 py-12 lg:px-8">
        <div class="w-full rounded-lg bg-white shadow sm:max-w-md">
            <div class="space-y-4 p-6 sm:p-8 md:space-y-6">

                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset Password</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form method="POST" class="space-y-6" action="/reset-password">
                        @csrf
                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                            <div class="sm:col-span-4">
                                <x-form-label for="password">New Password</x-form-label>
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
                                    <x-form-input id="password_confirmation" placeholder="Confirm Password"
                                        type="password" name="password_confirmation"></x-form-input>
                                    <x-form-error name="password_confirmation" />
                                </div>
                            </div>
                        </div>

                        <x-form-input  type="hidden"
                        name="email" value="{{ request('email') }}"></x-form-input>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-[#f00c93] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>
