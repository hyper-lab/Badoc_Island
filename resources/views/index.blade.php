
@include('partials.header')
<body>
<!-- Section 2 -->
<section class="px-2 py-32 bg-white md:px-0">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
    <div class="flex flex-wrap items-center sm:-mx-3">
      <div class="w-full md:w-1/2 md:px-3">
        <div class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
          <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
            <span class="block xl:inline">Welcome</span>
            <span class="block text-indigo-600 xl:inline">to our Reservation Platform!</span>
          </h1>
          <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">We're thrilled to have you here! Get ready to dive into the wave of fun and excitement. Our platform allows you to book your reservation in just a few clicks. So why wait? Start planning your perfect water park adventure today!.</p>
          <div class="relative flex flex-col sm:flex-row sm:space-x-4">
            <a href="#_" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-indigo-600 rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto">
              Book Now
              <!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg> -->
            </a>
            <a href="https://www.google.com/maps/place/Badoc+Island/@17.9182732,120.410033,15z/data=!4m6!3m5!1s0x338e9196489357ed:0x60b3216dbf361b9e!8m2!3d17.9198933!4d120.4144488!16s%2Fm%2F0j9n3jc?entry=ttu&g_ep=EgoyMDI0MTExMy4xIKXMDSoASAFQAw%3D%3D" target="_blank" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">View Location</a>           
             <a href="#section3" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
              Learn More
            </a>
          </div>
        </div>
      </div>
      <div class=" shadow-sm w-full md:w-1/2">
        <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{ asset('img/badoc2.jpg') }}" class="w-full">
            </div>
            <div class="swiper-slide">
              <img src="{{ asset('img/badoc1.jpg') }}" class="w-full">
            </div>
            <img src="{{ asset('img/badoc4.jpg') }}" class="w-full">
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- Add Navigation -->
<!--           <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div> -->
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.swiper-container', {
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
/*     navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }, */
  });
</script>


<!-- Section 3 -->
<section id = "section3"class="px-2 py-32 bg-white md:px-0">
  <div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="col-span-2 row-span-2 bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('img/badoc1.jpg') }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('img/badoc2.jpg') }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('img/badoc3.jpg') }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('img/badoc4.jpg') }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
      </div>
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ asset('img/main.jpg') }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
      </div>
    </div>
    <div class="mt-8 text-center">
      <h3 class="text-2xl font-semibold">Welcome to Badoc Water Park</h3>
      <p class="text-gray-600 mt-4 text-justify">Badoc Island is a gem located in Ilocos Norte, Philippines. This 36.256-hectare privately-owned island is known for its stunning natural beauty. It’s a 25-minute boat ride away from the La Virgen Milagrosa Cove located at Sitio Pagetpet, Brgy. La Milagrosa in Badoc, Ilocos Norte. The island is still in its purest, untouched state as it’s uninhabited. It has a long stretch of white-sand beach and crystal-clear turquoise waters that gradiate into deep blue as you go deeper. The island is surrounded by picture-worthy rock formations. There are no commercial establishments on the island. Visitors can enjoy various activities such as snorkeling, free diving, hiking on the many rock formations around the island, and even surfing along the waves. In 2022, the Ilocos Norte government introduced a 4,200 square-meter inflatable island with slides, towers, bridges, human launchers, and swings, among others, at the Paoay Lake Water Park to boost domestic tourism. In 2024, Ilocos Norte Tourism relocated the Ilocos Norte inflatable island to the stunning La Virgen Milagrosa Cove in Badoc, Ilocos Norte.</p>
    </div>
  </div>
</section>
</body>
@include('partials.footer')