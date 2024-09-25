<footer id="footer" class="bg-[#f00c93] py-10">

    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
            <!-- First Column -->
            <div class="col-span-1 md:col-span-1">
                <div class="text-center">
                    <img class="h-[140px] w-[140px]" src="{{ Storage::url($settings['footer_logo']) }}" alt="Footer Logo">
                </div>
            </div>

            <!-- Second Column -->
            <div class="col-span-1 md:col-span-1">
                <div>
                    <h1
                        class="border-bottom mb-3 border-b border-white font-bold text-white md:mb-10 md:border-0 md:text-xl lg:text-2xl">
                        {{ $settings['footer_social_links_title'] }}
                    </h1>
                    <div class="social-wrapper">
                        @foreach ($social_links as $item)
                            <a href="{{ $item['url'] }}" target="_blank">
                                <div class="mb-3 flex flex-row items-center">
                                    <img class="me-1 h-6 w-6" src="{{ storage::url($item['icon']) }}"
                                        alt="{{ $item['title'] }}">
                                    <p class="text-white duration-500 hover:text-[#ed6fb7]">
                                        {{ $item['title'] }}</p>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Third Column -->
            <div class="col-span-1 md:col-span-1">
                <div class="booking_details">
                    <!-- Add content or links here -->
                    <h1
                        class="border-bottom mb-3 border-b border-white font-bold text-white md:mb-10 md:border-0 md:text-xl lg:text-2xl">
                        {{ $settings['footer_contact_details_title'] }}
                    </h1>
                    @foreach ($contact_details as $item)
                        <div class="mb-1 text-white flex flex-row items-center gap-2">
                            {{ $item['title'] }} : {!! $item['info'] !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
