<section id="no-paied" class="flex h-full flex-col items-center justify-center bg-slate-50">
    <div class="container mx-auto">

        <header>
            <h1 class="text-center text-3xl font-bold text-[#f00c93]">Welcome {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}</h1>
            <div class="mt-6 text-center text-xl text-gray-500">
                {!! $settings['not_paied_message'] !!}
            </div>

            <div class="mt-6 flex justify-center text-center">

                <button
                    class="btn w-fit-content block rounded rounded bg-[#f00c93] px-6 py-2 text-center text-white hover:cursor-pointer hover:bg-[#ed6fb7] hover:text-[#fff]">
                    <a href="{{ route('home') }}">Homepage</a>
                </button>
            </div>
        </header>
    </div>
</section>
