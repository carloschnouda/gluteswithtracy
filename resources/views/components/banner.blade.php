<div id="banner" class="video-container">
    <div class="h-full w-full">
        @if ($settings['banner_video'])
            <video autoplay muted playsinline loop id="video-background" poster="{{ asset('assets/images/poster.png') }}">
                <source src="{{ Storage::url($settings['banner_video']) }}" type="video/mp4">
            </video>
        @else
            <img class="banner-image h-full w-full object-cover" src="{{ Storage::url($settings['banner_image']) }}"
                alt="Banner Image">
        @endif
    </div>

    <div class="video-description">
        <div class="container m-auto w-full">
            <div class="flex flex-row justify-center">
                <div class="basis-[90%] text-center md:basis-[60%]">
                    <div class="text-3xl font-bold text-white md:text-6xl">
                        {{ $settings['banner_title'] }}
                    </div>
                    <div class="text-md mt-4 text-white md:text-xl">
                        {{ $settings['banner_subtitle'] }}
                    </div>
                    <div class="mt-4">
                        <button id="banner-button"
                            class="btn rounded-md border-2 border-white p-2 px-6 py-3 text-[14px] hover:border-[#f00c93] hover:bg-[#f00c93] hover:text-[#fff]">
                            {{ $settings['banner_button'] }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
