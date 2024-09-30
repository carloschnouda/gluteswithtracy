<section id="testimonials" class="relative"
    style="background-image: url({{ Storage::url($settings['testimonials_background_image']) }}); background-repeat: no-repeat; background-size: cover">
    <div class="testimonials-overlay"></div>
    <div class="container relative z-10 mx-auto py-10 md:py-20">
        <div class="mb-10 text-center md:mb-20" animate='down'>
            <h1 class="text-4xl font-bold uppercase text-white">{{ $settings['testimonials_section_title'] }}</h1>
        </div>
        <div class="min-h-xl mx-auto grid max-w-6xl grid-cols-1 md:grid-cols-2" animate style="transition-delay: 0.7s">
            <div class="col-span-1">
                <div class="h-full">
                    <img class="h-full w-full rounded-t-lg object-cover md:rounded-l-lg"
                        src="{{ Storage::url($settings['testimonial_member_image']) }}" alt="">
                </div>
            </div>
            <div class="col-span-1">
                <div
                    class="flex h-full w-full flex-col items-start justify-center rounded-b-lg bg-white/10 px-6 py-10 text-xl font-semibold text-white backdrop-blur-sm transition hover:bg-white/20 hover:backdrop-blur-md md:rounded-r-lg">
                    <div class="">
                        <img class="h-24 w-24 translate-x-[-10%]" src="{{ asset('assets/images/quotes.svg') }}"
                            alt="testimonials quotes">
                    </div>
                    <!-- ... -->
                    <h3 class="mb-1 text-2xl font-bold">{{ $settings['testimonial_member_name'] }}</h3>
                    <small
                        class="mb-5 text-sm font-light italic">{{ $settings['testimonial_member_position'] }}</small>
                    <div class="text-md">
                        {!! $settings['testimonial_description'] !!}
                    </div>
                    <div class="flex w-full justify-end">
                        <img class="h-24 w-24 translate-x-[10%] rotate-180"
                            src="{{ asset('assets/images/quotes.svg') }}" alt="testimonials reverse quotes">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
