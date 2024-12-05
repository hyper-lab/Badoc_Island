<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<!-- Section 1 -->
<header>


<section class="w-full px-9 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="#_" class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-3xl font-black leading-none text-gray-900 select-none">Paoay Lake Water Park<span class="text-indigo-600">.</span></span>
            </a>
            <nav class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
            <a href="{{ route('home') }}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <!-- <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Features</a>
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Pricing</a> -->
             <a href="{{ url('/#section3') }}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Blog</a>
            </nav>
        </div>

        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                log in
            </a>
        </div>
    </div>
</section>

</header>