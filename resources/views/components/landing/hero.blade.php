<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                {{ config('app.name') }}<br />GYM & FITNESS
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                <b>Royal Fit Gym & Fitness</b> adalah salah satu tempat gym & fitness terlengkap dan termurah di
                bandung. Kami
                menyediakan berbagai macam alat fitness dan gym yang lengkap dan modern. Dilengkapi dengan instruktur
                yang berpengalaman dan ramah, maka pelanggan akan merasa nyaman dan aman saat berlatih di tempat kami.
                Kami juga memiliki berbagai macam paket yang sesuai dengan kebutuhan dan budget Anda. Dengan berlatih di
                <b>Royal Fit Gym & Fitness</b>, Anda akan mendapatkan hasil yang maksimal dan kesehatan yang lebih baik.
            </p>
            <a href="#" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center">
                Daftar Sekarang
            </a>
            <a href="#"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Hubungi Kami
            </a>
        </div>
        <div class="mt-5 lg:mt-0 lg:col-span-5 lg:flex">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image1.jpg') }}" alt="Image 1">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image2.jpg') }}" alt="Image 2">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image3.jpg') }}" alt="Image 3">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image4.jpg') }}" alt="Image 4">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image5.jpg') }}" alt="Image 5">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image6.jpg') }}" alt="Image 6">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image7.jpg') }}" alt="Image 7">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image8.jpg') }}" alt="Image 8">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg object-cover hover:scale-105 transition-all duration-300"
                            src="{{ Vite::asset('resources/images/image9.jpg') }}" alt="Image 9">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
