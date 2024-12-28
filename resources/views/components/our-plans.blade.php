<section id="plans">
    <div class="mx-auto max-w-screen-xl px-4 py-10 lg:px-6 lg:py-20">
        <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
            <h2 class="mb-4 text-3xl font-bold tracking-tight tracking-wide text-[#f00c93] lg:text-4xl" animate='up'>
                {{ $settings['plans_section_title'] }}
            </h2>
            <p class="font-light text-gray-400 sm:text-xl" animate='down'>
                {{ $settings['plans_section_subtitle'] }}
            </p>
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto mt-8 grid max-w-md grid-cols-1 gap-6 text-center lg:mt-16 lg:max-w-full lg:grid-cols-3">
                @foreach ($plans as $index => $plan)
                    <x-plan-card :plan="$plan" index="{{ $index }}" />
                @endforeach
            </div>
        </div>
    </div>
</section>
