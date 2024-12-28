<section id="services">
    <div class="mx-auto max-w-screen-xl px-4 py-10 lg:px-6 lg:py-20">
        <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
            <h2 class="mb-4 text-3xl font-bold tracking-tight tracking-wide text-[#f00c93] lg:text-4xl" animate='up'>
                {{ $settings['services_section_title'] }}
            </h2>
            <p class="font-light text-gray-400 sm:text-xl" animate='down'>
                {{ $settings['services_section_subtitle'] }}
            </p>
        </div>
        <div class="grid grid-cols-1 items-center justify-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $index => $service)
                <x-service-card :service="$service" index="{{ $index }}" />
            @endforeach
        </div>
    </div>
</section>
