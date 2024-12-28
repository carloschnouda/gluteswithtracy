<div class="{{ $plan['custom_plan'] ? 'shadow-lg' : '' }} overflow-hidden rounded-md border-2 border-gray-100 bg-white">
    <div class="flex h-full flex-col p-8 xl:px-12">
        <h3 class="text-base font-semibold text-[#f00c93]">{{ $plan['title'] }}</h3>
        <p class="mt-7 text-5xl font-bold text-black">${{ $plan['price'] }}</p>
        <p class="mt-3 text-base text-gray-600">{{ $plan['subtitle'] }}</p>

        <div class="plan-description mt-9 flex flex-col items-center justify-center space-y-5 text-left">
            {!! $plan['description'] !!}
        </div>

        @if ($plan['custom_plan'])
            <div class="inline-flex grow items-end justify-center">

                <div id='plan-btn' data-section="contact"
                    class="mt-10 rounded-md bg-[#f00c93] px-10 py-4 text-base font-semibold text-white transition-all duration-200 hover:bg-[#ed6fb7]"
                    role="button"> {{ $plan['button_text'] }}</div>
            </div>
        @else
            <div class="inline-flex grow items-end justify-center">

                <a href="{{ route('login') }}"
                    class="mt-10 rounded-md bg-[#f00c93] px-10 py-4 text-base font-semibold text-white transition-all duration-200 hover:bg-[#ed6fb7]"
                    role="button"> {{ $plan['button_text'] }}</a>
            </div>
        @endif
    </div>
</div>
