<x-layout>

    <div class="body-overlay">
    </div>
    <x-navbar />

    <x-banner />

    <x-about-us />

    <section id="parallax">
        <div class="relative h-[540px] w-full overflow-y-scroll bg-cover bg-scroll bg-center bg-no-repeat lg:bg-fixed"
            style="background-image:url({{ Storage::url($settings['about_image']) }});">
            @if ($settings['about_image_description'])
                <div class="absolute inset-0 mx-auto flex max-w-[80%] items-center justify-center text-center" animate='up' style='transition-delay: 1.5s'>
                    <h1 class="text-3xl font-bold text-white md:text-4xl">{{ $settings['about_image_description'] }}</h1>
                </div>
            @endif
        </div>
    </section>

    <x-our-plan :services="$services" />

    <x-testimonials />

    <x-faq :faqs="$faqs" />

    <x-contact-form />

    <x-footer />

</x-layout>
