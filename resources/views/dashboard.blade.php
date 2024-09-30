<x-layout>
    <x-navbar />
    @if (Auth::user()->paied)
        <div class="container mx-auto py-10">
            <header>
                <h1 class="text-center text-3xl font-bold text-[#f00c93]">Welcome {{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}</h1>
                <h2 class="mt-2 text-center text-xl text-[#f00c93] text-gray-500">Here you can find your proffessional
                    workout plan</h2>
            </header>

            <div id="nutrition_section">
                <h1 class="mt-10 text-3xl font-bold text-[#f00c93]">{{ $settings['nutrition_section_title'] }}</h1>
                <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-2">
                    <div class="description mt-5">
                        {!! $settings['nutrition_section_description'] !!}
                    </div>
                    <div class="image">
                        <img src="{{ Storage::url($settings['nutrition_section_image']) }}" alt="Nutrition Image">
                    </div>
                </div>
            </div>
            <section id="workout" class="mt-10">
                <h1 class="mb-10 text-center text-4xl font-bold text-[#f00c93]">{{ $settings['workout_section_title'] }}
                </h1>
                <div class="grid grid-cols-1 gap-10 rounded-lg shadow-2xl md:grid-cols-3 md:p-10">
                    @foreach ($workout_plans as $plan)
                        <div class="mb-10">
                            <h1 class="mb-5 text-center text-3xl font-bold">{{ $plan->title }}</h1>
                            @foreach ($plan->categories as $category)
                                <div class="mb-10">
                                    <div>
                                        <p class="my-3 text-center text-3xl font-bold text-[#f00c93]">
                                            {{ $category->title }}
                                        </p>
                                    </div>

                                    @foreach ($category->workouts as $workout)
                                        <div class="workout-wrapper {{ $workout->video ? 'hover:cursor-pointer hover:rounded-lg hover:bg-[#f00c93] hover:shadow-md' : '' }} group mb-2"
                                            data-video-url="{{ Storage::url($workout->video) }}">
                                            <p
                                                class="{{ $workout->video ? 'group-hover:text-[#fff]' : '' }} text-center text-xl text-[#f00c93]">
                                                {{ $workout->name }}</p>
                                            <p
                                                class="text-md {{ $workout->video ? 'group-hover:text-[#fff]' : '' }} text-center text-gray-500">
                                                {{ $workout->repetition }}</p>
                                            @if ($workout->video)
                                                <p
                                                    class="text-center text-xs italic text-gray-500 group-hover:text-[#fff]">
                                                    Click To watch video</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>
            <section class="membership-section mt-10">
                {!! $settings['membership_section'] !!}
            </section>
        </div>

        <!-- Modal Structure -->
        <div id="videoModal"
            class="fixed inset-0 z-50 flex hidden items-center justify-center bg-gray-900 bg-opacity-75">
            <div class="aspect-video rounded-lg p-5">
                <video id="workoutVideo" controls class="h-auto w-full md:h-[500px]">
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
        <x-progress-form />
    @else
        <x-no-paied />
    @endif

    <x-footer />
</x-layout>
