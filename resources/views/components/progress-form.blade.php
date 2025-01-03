<section class="bg-slate-50 py-10 md:pb-20">

    <div class="container mx-auto mb-10">
        <h2 class="text-center text-3xl font-bold uppercase tracking-wide text-[#f00c93]" animate="up">
            Submit Your Progress
        </h2>
        <h4 class="text-center text-lg font-semibold tracking-wide text-[#f00c93]" animate="down">
            Share your progress to unlock next month's workout plan!
        </h4>
        <p class="text-md mt-2 text-center tracking-wide text-gray-600">
            Stay on track by submitting your results. Once submitted, you'll gain access to the upcoming workout plan.
        </p>
    </div>
    <form id="progress-form" class="mx-5 max-w-lg rounded-xl bg-white p-10 shadow-xl md:mx-auto" animate method="POST"
        action="{{ route('progress') }}">
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="group relative z-0 mb-5 w-full">
                <input type="text" name="first_name" id="floating_first_name"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 px-1 py-1.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder="" value="{{ Auth::user()->first_name ? Auth::user()->first_name : '' }}" />
                <label for="floating_first_name"
                    class="absolute top-0 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4">First
                    name</label>
            </div>
            <div class="group relative z-0 mb-5 w-full">
                <input type="text" name="last_name" id="floating_last_name"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-1 py-1.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " value="{{ Auth::user()->last_name ? Auth::user()->last_name : '' }}" />
                <label for="floating_last_name"
                    class="absolute top-0 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4">Last
                    name</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">

            <div class="group relative z-0 mb-5 w-full">
                <input type="email" name="email" id="floating_email"
                    class="peer mt-2 block w-full appearance-none border-0 border-b-2 border-gray-300 bg-gray-100 px-1 py-1.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " value="{{ Auth::user()->email ? Auth::user()->email : '' }}" readonly />
                <label for="floating_email"
                    class="absolute top-2 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4">Email
                    address</label>
            </div>

            <div class="group relative z-0 mb-5 w-full">
                <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    type="text" name="phone_number" id="floating_phone"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " value="{{ Auth::user()->phone_number }}" />
                <label for="floating_phone"
                    class="absolute top-2 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4">Phone
                    number</label>
            </div>

        </div>
        <div class="grid md:grid-cols-1 md:gap-6">

            <div class="group relative z-0 mb-5 w-full">
                <input type="text" name="current_weight" id="current_weight"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label for="current_weight"
                    class="absolute top-2 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4">Current
                    Weight <span class="text-xs text-gray-500 peer-focus:text-[#f00c93]">(kg)</span></label>

            </div>

        </div>
        <div class="grid md:grid-cols-1">
            <div class="group relative z-0 mb-5 w-full">

                <label class="mb-2 block text-sm font-medium text-gray-900" for="front_image">
                    Front Image</label>
                <input
                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:outline-none"
                    id="front_image" name="front_image" type="file">

            </div>
        </div>
        <div class="grid md:grid-cols-1">
            <div class="group relative z-0 mb-5 w-full">

                <label class="mb-2 block text-sm font-medium text-gray-900" for="back_image">
                    Back Image</label>
                <input
                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:outline-none"
                    id="back_image" name="back_image" type="file">

            </div>
        </div>
        <div class="grid md:grid-cols-1">
            <div class="group relative z-0 mb-5 w-full">

                <label class="mb-2 block text-sm font-medium text-gray-900" for="side_image">
                    Side Image</label>
                <input
                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:outline-none"
                    id="side_image" name="side_image" type="file">

            </div>
        </div>

        <div class="group relative z-0 mb-5 w-full">
            <textarea name="message" id="floating_message" rows="4"
                class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                placeholder=" "></textarea>
            <label for="floating_message"
                class="text-gray900 absolute top-2 origin-[0] -translate-y-6 scale-75 transform text-sm font-medium duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4">
                Your Message
            </label>
        </div>

        <button type="submit" id="progress-btn"
            class="text-md w-full justify-center rounded-md bg-[#f00c93] px-6 py-2 font-bold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:flex">
            Submit
        </button>
        <div class="flex hidden justify-center" id="loader-wrapper">
            <div class="loader"></div>
        </div>

        <div id="alert-success"
            class="my-4 flex items-center border-t-4 border-green-300 bg-green-50 p-4 text-green-800" role="alert">
            <div class="ms-3 text-sm font-medium">
                Thank you for sharing your information with us. We will reach out soon.
            </div>
        </div>

        <div id="alert-danger" class="my-4 flex items-center border-t-4 border-red-300 bg-red-50 p-4 text-red-800"
            role="alert">
            <div class="message ms-3 text-sm font-medium">

            </div>
        </div>
    </form>

</section>
