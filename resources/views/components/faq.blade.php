<section id="faq" class="py-10 md:py-20">
    <div class="container">
        <h2 class="mb-10 text-center text-3xl font-bold uppercase tracking-wide text-[#f00c93]">
            {{ $settings['faq_section_title'] }}</h2>
        <div class="accordion">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">{{ $faq['question'] }}</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        {!! $faq['answer'] !!}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
