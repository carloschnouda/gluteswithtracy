<section id="contact" class="bg-slate-50 py-10 md:pb-20" >

    <h2 class="mb-10 text-center text-3xl font-bold uppercase tracking-wide text-[#f00c93]" animate='up'>
        {{ $settings['contact_section_title'] }}</h2>

    <form id="contact-form" class="mx-auto max-w-lg rounded-xl bg-white p-10 shadow-xl" method="POST"
    animate='down'
        action="{{ route('contact') }}">
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="group relative z-0 mb-5 w-full">
                <input type="text" name="first_name" id="floating_first_name"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder="" />
                <label for="floating_first_name"
                    class="absolute top-2 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4 ">First
                    name</label>
            </div>
            <div class="group relative z-0 mb-5 w-full">
                <input type="text" name="last_name" id="floating_last_name"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label for="floating_last_name"
                    class="absolute top-2 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4 ">Last
                    name</label>
            </div>
        </div>
        <div class="group relative z-0 mb-5 w-full">
            <input type="email" name="email" id="floating_email"
                class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                placeholder=" " />
            <label for="floating_email"
                class="absolute top-2 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 ">Email
                address</label>
        </div>

        <div class="grid md:grid-cols-1">
            <div class="group relative z-0 mb-5 w-full">
                <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    type="text" name="phone" id="floating_phone"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                    placeholder=" " />
                <label for="floating_phone"
                    class="absolute top-2 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:translate-x-1/4 ">Phone
                    number</label>
            </div>
        </div>

        <div class="group relative z-0 mb-5 w-full">
            <textarea name="message" id="floating_message" rows="4"
                class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-[#f00c93] focus:outline-none focus:ring-0"
                placeholder=" "></textarea>
            <label for="floating_message"
                class="absolute top-2 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-[#f00c93] rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4 ">
                Your Message
            </label>
        </div>

        <button type="submit" id="submit-btn"
            class="text-md w-full justify-center rounded-md bg-[#f00c93] px-6 py-2 font-bold leading-6 text-white shadow-sm hover:bg-[#ed6fb7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 md:flex">
            Submit
        </button>
        <div class="flex hidden justify-center" id="loader-wrapper">
            <div class="loader"></div>
        </div>

        <div id="alert-success"
            class="my-4 flex items-center border-t-4 border-green-300 bg-green-50 p-4 text-green-800"
            role="alert">
            <div class="ms-3 text-sm font-medium">
                Thank you for contacting us. We will get back to you soon.
            </div>
        </div>

        <div id="alert-danger" class="my-4 flex items-center border-t-4 border-red-300 bg-red-50 p-4 text-red-800"
            role="alert">
            <div class="message ms-3 text-sm font-medium">

            </div>
        </div>
    </form>

</section>
