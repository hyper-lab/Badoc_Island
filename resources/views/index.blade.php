
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
          <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">We're thrilled to have you here! Get ready to dive into the wave of fun and excitement. Our platform allows you to book your reservation in just a few clicks. So why wait? Start planning your perfect water park adventure today!</p>
          <div class="relative flex flex-col sm:flex-row sm:space-x-4">
            <a href="Reservation/step-one" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-indigo-600 rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto">
              Book Now
            </a>
            <a href="https://www.google.com/maps/place/Paoay+Lake+Water+Park/@18.1285612,120.536769,17z/data=!3m1!4b1!4m6!3m5!1s0x338ebfda015e5f43:0x54036e79f7d4852a!8m2!3d18.1285612!4d120.5393439!16s%2Fg%2F11rp5xwgsm?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D" target="_blank" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">View Location</a>           
            <a href="#section3" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
              Learn More
            </a>
          </div>
        </div>
      </div>
      <div class="shadow-sm w-full md:w-1/2">
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
        </div>
      </div>
    </div>
  </div>
</section>

<!-- New Section: Book Online and Save -->
<section class="px-2 py-16 bg-indigo-600 text-white md:px-0">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
    <div class="text-center">
      <h2 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
        BOOK ONLINE AND SAVE UP TO 10%
      </h2>
      <p class="mt-4 text-lg sm:text-xl md:text-2xl">Take advantage of our online booking discount and save up to 10% on your reservation. Don't miss out on this exclusive offer!</p>
      <a href="Reservation/step-one" class="mt-8 inline-block px-6 py-3 text-lg bg-white text-indigo-600 rounded-md hover:bg-gray-200">Book Now</a>
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
  });
</script>

<!-- Section 3 -->
<section id="section3" class="px-2 py-32 bg-white md:px-0">
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
      <h3 class="text-2xl font-semibold">Welcome to Paoay Lake Water Park</h3>
      <p class="text-gray-600 mt-4 text-justify">The Paoay Lake Water Park’s main attraction is its floating playground, obstacle course, an inflatable island, and other attractions that make it a must-visit summer destination. If you prefer to stay on land, there are fun things to do aside from water activities: you can skate, beach volleyball, kayak, and bike!

The Paoay Lake Water Park also has a food park for your cravings when you get hungry. Of course, this Inflatable Island and water park is the perfect backdrop for your summer pics, thanks to the aesthetically-pleasing landscape.</p>
    </div>
  </div>
</section>

<!-- New Section: Rates -->
<section class="px-2 py-16 bg-gray-100 text-gray-900 md:px-0">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
    <div class="text-center">
      <h2 class="text-4xl font-extrabold tracking-tight sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
        Rate starts at P399! 😎🤙🏻
      </h2>
      <p class="mt-4 text-lg sm:text-xl md:text-2xl">🏝Splash - P399 for Two-hr inflatable play pass</p>
      <p class="mt-2 text-lg sm:text-xl md:text-2xl">🏝Spray - P499 for Half-day inflatable play pass</p>
      <p class="mt-2 text-lg sm:text-xl md:text-2xl">🏝Soaked - P599 for Whole Day inflatable play pass</p>
      <p class="mt-4 text-lg sm:text-xl md:text-2xl">ALL Play Passes have WHOLE DAY ACCESS to the I’M IN LOUNGE!</p>
    </div>
  </div>
</section>


<BR></BR>
</body>
@include('partials.footer')