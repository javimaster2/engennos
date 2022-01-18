<section  style="background-image:url({{ asset('img/home/poimg.png') }})">

    <div class="bg-white bg-opacity-20 min-h-screen flex flex-col sm:justify-center items-center sm:pt-">
        <div>
            {{ $logo }}
        </div>

        <div class=" w-full sm:max-w-md  mt-4 px-4 py-6 bg-gray-300 bg-opacity-70  shadow-2xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</section>