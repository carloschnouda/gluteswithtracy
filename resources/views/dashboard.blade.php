<x-layout>
    <x-navbar />
    @if (Auth::user()->paied)
        <div class="container mx-auto py-10">
            <header>
                <h1 class="text-center text-3xl font-bold text-[#f00c93]" animate='up'>Welcome
                    {{ Auth::user()->first_name }}
                    {{ Auth::user()->last_name }}</h1>
                <h2 class="mt-2 text-center text-xl text-[#f00c93] text-gray-500" animate='down'>Here you can find your
                    proffessional
                    workout plan</h2>
            </header>

            <!-- Nutrition section -->
            <section id="nutrition_section">
                <div>
                    <h1 class="mt-10 text-3xl font-bold text-[#f00c93]" animate>
                        {{ $settings['nutrition_section_title'] }}
                    </h1>
                    <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-2">
                        <div class="description mt-5" animate style="transition-delay: 1s">
                            {!! $settings['nutrition_section_description'] !!}
                        </div>
                        <div class="image">
                            <img animate='right' style="transition-delay: 1.5s"
                                src="{{ Storage::url($settings['nutrition_section_image']) }}" alt="Nutrition Image">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Workout section -->
            <section id="workout" class="mt-10">
                <h1 class="mb-10 text-center text-4xl font-bold text-[#f00c93]" animate>
                    {{ $settings['workout_section_title'] }}
                </h1>
                <div class="grid grid-cols-1 gap-10 p-5 md:p-10">
                    @foreach ($workout_plans as $plan)
                        <div class="mb-10" animate style="transition-delay: {{ $loop->index * 0.8 }}s">
                            <h1 class="mb-5 text-center text-3xl font-bold">{{ $plan->title }}</h1>
                            <div class="grid grid-cols-1 gap-5 rounded-lg p-5 shadow-2xl {{ count($plan->categories) < 2 ? 'sm:grid-cols-1 md:grid-cols-1' : 'sm:grid-cols-2 md:grid-cols-3' }}  md:p-10 justify-items-center ">
                                @foreach ($plan->categories as $category)
                                    <div class="mb-10 col-span-1">
                                        <div>
                                            <p class="my-3 text-center text-3xl font-bold text-[#f00c93]">
                                                {{ $category->title }}
                                            </p>
                                        </div>

                                        @foreach ($category->workouts as $workout)
                                            <div class="workout-wrapper {{ $workout->video ? 'hover:cursor-pointer hover:rounded-lg hover:bg-[#f00c93] hover:shadow-md' : '' }} group mb-2"
                                                data-video-url="{{ Storage::url($workout->video) }}"
                                                data-video={{ $workout->video }}>
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
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Ab Routine -->
            <section id="ab_routine" class="mt-20">
                <h1 class="text-center text-4xl font-bold text-[#f00c93]" animate>{{ $settings['abs_section_title'] }}
                </h1>
                <h3 class="mb-10 mt-2 text-center text-xl text-[#f00c93] text-gray-500" animate>
                    {{ $settings['abs_section_subtitle'] }}</h3>
                <div class="grid grid-cols-1 gap-5 rounded-lg p-5 shadow-2xl md:grid-cols-3 md:p-10">
                    @foreach ($abs_workout as $ab_workout)
                        <div animate style="transition-delay: {{ $loop->index * 0.5 }}s">
                            <div class="workout-wrapper {{ $ab_workout->video ? 'hover:cursor-pointer hover:rounded-lg hover:bg-[#f00c93] hover:shadow-md' : '' }} group mb-2"
                                data-video-url="{{ Storage::url($ab_workout->video) }}"
                                data-video={{ $ab_workout->video }}>
                                <p
                                    class="{{ $ab_workout->video ? 'group-hover:text-[#fff]' : '' }} mb-1 text-center text-2xl font-bold text-[#f00c93]">
                                    {{ $ab_workout->name }}</p>
                                <p
                                    class="text-md {{ $ab_workout->video ? 'group-hover:text-[#fff]' : '' }} mb-2 text-center text-gray-500">
                                    {{ $ab_workout->repetition }}</p>
                                @if ($ab_workout->video)
                                    <p class="text-center text-xs italic text-gray-500 group-hover:text-[#fff]">
                                        Click To watch video</p>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Stretch message -->
            <section id="stretch_message" class="mt-20">
                <h1 class="rounded bg-[#f00c93] p-5 text-center text-5xl font-bold tracking-wider text-[#fff] md:text-6xl"
                    animate>
                    {{ $settings['stretch_message'] }}
                </h1>
            </section>

            <!-- Warm up section -->
            <section id="warm_up" class="mt-20">
                <div class="relative mt-10">
                    <video id="warmUpVideo" src="{{ Storage::url($settings['warm_up_section_video']) }}"
                        class="aspect-video w-full" controls></video>
                </div>
                <div class="description mt-20">
                    {!! $settings['warm_up_section_description'] !!}
                </div>
            </section>

            <!-- Membership section -->
            <section class="membership-section mt-20" animate>
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
