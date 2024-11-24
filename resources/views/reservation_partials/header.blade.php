<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Document</title>
    <!-- @vite('resources/css/app.css') -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Section 1 -->
<section class="w-full px-9 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-center py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col items-center md:flex-row">
            <a href="#_" class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-3xl font-black leading-none text-gray-900 select-none">Badoc Water Park<span class="text-indigo-600">.</span></span>
            </a>
            <nav class="flex flex-wrap items-center justify-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="{{ route('home') }}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <!-- <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Features</a>
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Pricing</a> -->
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Blog</a>
            </nav>
        </div>
    </div>
</section>