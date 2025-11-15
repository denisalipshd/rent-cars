@extends('layouts.app')

@section('title', 'RentCars | Home')

@section('content')

<!-- hero gradient -->
    <div class="bg-linear-to-bl from-blue-200 to-blue-100">
      <!-- Hero Section -->
      <section class="home relative pt-32">
        <div>
          <div class="px-4 sm:px-12 md:px-14 xl:px-16 pt-8 md:pt-16 flex flex-col lg:flex-row items-center justify-center gap-6 md:gap-12 overflow-hidden">
            <!-- Teks Hero -->
            <div class="flex flex-col space-y-4 md:space-y-6 lg:space-y-8 max-w-xl text-center md:text-left">
              <h1 class="text-3xl md:text-5xl font-bold leading-tight">
                Easy And Fast Way To
                <span class="text-blue-500">Rent</span> Your Cars
              </h1>
              <p class="text-gray-700 text-sm md:text-base">Find the best cars at the best price. Book now and drive with confidence!</p>
              <div>
                <a href="#rentCars" class="bg-blue-500 text-white px-8 py-2 md:px-8 md:py-3 rounded-md shadow-md hover:bg-blue-600 transition text-base md:text-lg inline-block">Rent Car</a>
              </div>
            </div>

            <!-- Gambar Hero -->
            <div class="flex-1 pt-20 pb-32 md:pt-0 md:pb-0 flex justify-center md:justify-end">
              <img src="{{ asset('./assets/images/force.png') }}" alt="Car" class="w-full min-w-[380px] object-contain" />
            </div>
          </div>

          <!-- FORM CARI MOBIL -->
          <form action="{{ route('front.rent-cars.search') }}" method="GET">
            <div class="max-w-[90%] w-11/12 absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 z-10 mx-auto bg-white shadow-lg py-8 px-6 md:px-12 md:py-12 rounded-2xl">
              <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6">
                <!-- Card 1: Brand -->
                <div class="card flex flex-col gap-2">
                  <span class="font-bold text-sm md:text-base">Select Brand</span>
                  <div class="border border-gray-400 py-2 px-4 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-car text-blue-500"></i>
                    <select name="brand_id" class="w-full bg-transparent focus:outline-none text-xs md:text-sm text-gray-700">
                      <option value="">Choose brand</option>
                      @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Card 2: Pickup Date -->
                <div class="card flex flex-col gap-2">
                  <span class="font-bold text-sm md:text-base">Pick up Date</span>
                  <div class="border border-gray-400 py-2 px-4 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-blue-500"></i>
                    <input type="date" name="pickup_date" class="w-full bg-transparent focus:outline-none text-xs md:text-sm text-gray-700" />
                  </div>
                </div>

                <!-- Card 3: Return Date -->
                <div class="card flex flex-col gap-2">
                  <span class="font-bold text-sm md:text-base">Return Date</span>
                  <div class="border border-gray-400 py-2 px-4 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-calendar-days text-blue-500"></i>
                    <input type="date" name="return_date" class="w-full bg-transparent focus:outline-none text-xs md:text-sm text-gray-700" />
                  </div>
                </div>

                <!-- Card 4: Tombol Search -->
                <div class="flex justify-center items-end pt-4 sm:pt-0">
                  <button class="bg-blue-500 sm:w-auto px-8 py-3 rounded-xl text-white text-sm font-semibold hover:bg-blue-600 transition"><i class="fa-solid fa-magnifying-glass mr-2"></i> Search Car</button>
                </div>
              </div>
            </div>
          </form>

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,256L1440,96L1440,320L0,320Z"></path>
          </svg>
        </div>
      </section>
    </div>

    <!-- Latest Inventory -->
    <section id="rentCars" class="mt-60 md:mt-52 flex flex-col px-4 sm:px-12 md:px-14 xl:px-16">
      <!-- Judul -->
      <div class="text-center space-y-2 mb-12 md:mb-20">
        <h2 class="font-bold text-3xl md:text-4xl">Latest <span class="text-blue-500">Inventory</span></h2>
        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, repellat!</p>
      </div>

      <!-- Grid Card -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card -->
        @forelse($cars as $car)
          <div class="card bg-white shadow-xl rounded-2xl overflow-hidden hover:shadow-2xl transition flex flex-col">
            <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="{{ $car->name }}" class="w-full md:h-52 h-auto object-cover rounded-lg p-4" />

            <!-- Konten -->
            <div class="p-6 flex flex-col justify-between grow">
              <!-- Info Mobil -->
              <div class="space-y-4">
                <h3 class="font-semibold text-lg text-gray-800">{{ $car->name }}</h3>

                <div class="flex items-center flex-wrap gap-4 text-gray-600">
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-wheelchair text-blue-500"></i>
                    <span>{{ $car->seats }} Seats</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-gas-pump text-blue-500"></i>
                    <span>{{ $car->fuel_type }}</span>
                  </div>
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-gear text-blue-500"></i>
                    <span>{{ $car->transmission }}</span>
                  </div>
                </div>
              </div>

              <!-- Harga & Tombol -->
              <div class="flex items-center justify-between pt-6">
                <p class="text-gray-800 font-bold text-lg">Rp {{ number_format($car->price_per_day, 0, ',', '.') }} <span class="text-sm text-gray-500">/day</span></p>
                <button 
                  id="rentNowBtn"
                  class="rentNowBtn bg-blue-500 text-white px-5 py-2 rounded-lg hover:cursor-pointer hover:bg-blue-600 transition font-medium"
                  data-id="{{ $car->id }}"
                  data-name="{{ $car->name }}"
                  data-thumbnail="{{ asset('storage/' . $car->thumbnail) }}"
                  data-price="{{ $car->price_per_day }}"
                  data-seats="{{ $car->seats }}"
                  data-fuel="{{ $car->fuel_type }}"
                  data-transmission="{{ $car->transmission }}"
                >Rent Now
              </button>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-full flex justify-center">
            <p class="text-gray-500">No latest cars found.</p>
          </div>
        @endforelse
      </div>

      <div class="pt-16 text-center">
        <button class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 hover:cursor-pointer transition font-medium">View All Cars</button>
      </div>
    </section>
    <!-- Latest Inventory -->

    <!-- About start -->
    <section class="mt-42 flex flex-col px-4 sm:px-12 md:px-14 xl:px-16">
      <!-- judul -->
      <div class="text-center space-y-2 mb-12 md:mb-20">
        <h2 class="font-bold text-3xl md:text-4xl">Why <span class="text-blue-500">Choose</span> Us</h2>
        <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, vero.</p>
      </div>

      <div class="max-w-[90%] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- 1. 24 Hour Support -->
          <div class="card flex items-start gap-4">
            <div class="bg-blue-500 p-2 rounded-md transition-transform duration-300 hover:scale-110 hover:bg-blue-600 hover:cursor-pointer">
              <i class="fa-solid fa-headset text-white text-2xl"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-semibold text-xl md:text-2xl">24/7 Customer Support</h3>
              <p class="text-sm text-gray-500">Our support team is available anytime to assist you with your booking.</p>
            </div>
          </div>

          <!-- 2. Best Price -->
          <div class="card flex items-start gap-4">
            <div class="bg-blue-500 p-2 rounded-md transition-transform duration-300 hover:scale-110 hover:bg-blue-600 hover:cursor-pointer">
              <i class="fa-solid fa-tags text-white text-2xl"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-semibold text-xl md:text-2xl">Best Price Guarantee</h3>
              <p class="text-sm text-gray-500">Enjoy the best prices with top-quality service every time.</p>
            </div>
          </div>

          <!-- 3. Verified License -->
          <div class="card flex items-start gap-4">
            <div class="bg-blue-500 p-2 rounded-md transition-transform duration-300 hover:scale-110 hover:bg-blue-600 hover:cursor-pointer">
              <i class="fa-solid fa-certificate text-white text-2xl"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-semibold text-xl md:text-2xl">Verified License</h3>
              <p class="text-sm text-gray-500">All our vehicles and drivers are fully licensed and verified.</p>
            </div>
          </div>

          <!-- 4. Free Cancelation -->
          <div class="card flex items-start gap-4">
            <div class="bg-blue-500 p-2 rounded-md transition-transform duration-300 hover:scale-110 hover:bg-blue-600 hover:cursor-pointer">
              <i class="fa-solid fa-ban text-white text-2xl"></i>
            </div>
            <div class="space-y-1">
              <h3 class="font-semibold text-xl md:text-2xl">Free Cancellation</h3>
              <p class="text-sm text-gray-500">Cancel your booking for free up to 24 hours before pickup.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About end -->

    <!-- Our Achivements -->
    <section class="mt-42 flex flex-col px-4 sm:px-12 md:px-14 xl:px-16">
      <!-- judul -->
      <div class="text-center space-y-2 mb-12 md:mb-20">
        <h2 class="font-bold text-3xl md:text-4xl">Our <span class="text-blue-500">Achivements</span></h2>
        <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, vero.</p>
      </div>

      <div class="min-w-[90%] mx-auto bg-white rounded-xl py-8 px-6 md:px-12 shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-200">
          <!-- Card 1 -->
          <div class="card px-12 py-8 text-center">
            <h3 class="text-3xl font-semibold text-blue-500">4000+</h3>
            <span class="text-gray-600">Active Member</span>
          </div>

          <!-- Card 2 -->
          <div class="card px-12 py-8 text-center">
            <h3 class="text-3xl font-semibold text-blue-500">3000+</h3>
            <span class="text-gray-600">Car Model</span>
          </div>

          <!-- Card 3 -->
          <div class="card px-12 py-8 text-center">
            <h3 class="text-3xl font-semibold text-blue-500">6K+</h3>
            <span class="text-gray-600">Positive Rating</span>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Achivements -->

    <!-- testimonial -->
    <section class="mt-40 py-20 flex flex-col px-4 sm:px-12 md:px-14 xl:px-16 bg-blue-100">
      <!-- judul -->
      <div class="text-center space-y-2 mb-12 md:mb-20">
        <h2 class="font-bold text-3xl md:text-4xl">What Our <span class="text-blue-500">Customers</span> Have To Say</h2>
        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, vero.</p>
      </div>

      <!-- Swiper Container -->
      <div class="max-w-[90%] mx-auto">
        <div class="swiper mySwiper pb-10">
          <!-- Wrapper -->
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="card flex flex-col gap-4 bg-white shadow-lg p-6 rounded-xl text-center items-center">
                <img src="{{ asset('assets/images/sergio-de-paula.jpg') }}" alt="Sergio de Paula" class="w-16 h-16 rounded-full object-cover" />
                <div>
                  <h3 class="font-semibold text-lg">Sergio de Paula</h3>
                  <span class="text-sm text-gray-500 block mb-2">Customer</span>
                  <blockquote class="text-sm text-gray-600 italic">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae!"</blockquote>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="card flex flex-col gap-4 bg-white shadow-lg p-6 rounded-xl text-center items-center">
                <img src="{{ asset('assets/images/sergio-de-paula.jpg') }}" alt="Alex Johnson" class="w-16 h-16 rounded-full object-cover" />
                <div>
                  <h3 class="font-semibold text-lg">Alex Johnson</h3>
                  <span class="text-sm text-gray-500 block mb-2">Customer</span>
                  <blockquote class="text-sm text-gray-600 italic">"A great service! The car was clean, and the process was quick and easy."</blockquote>
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div class="card flex flex-col gap-4 bg-white shadow-lg p-6 rounded-xl text-center items-center">
                <img src="{{ asset('assets/images/sergio-de-paula.jpg') }}" alt="Maria Gonzales" class="w-16 h-16 rounded-full object-cover" />
                <div>
                  <h3 class="font-semibold text-lg">Maria Gonzales</h3>
                  <span class="text-sm text-gray-500 block mb-2">Customer</span>
                  <blockquote class="text-sm text-gray-600 italic">"The best car rental experience I've ever had. Highly recommended!"</blockquote>
                </div>
              </div>
            </div>

            <!-- Slide 4 -->
            <div class="swiper-slide">
              <div class="card flex flex-col gap-4 bg-white shadow-lg p-6 rounded-xl text-center items-center">
                <img src="{{ asset('assets/images/sergio-de-paula.jpg') }}" alt="Maria Gonzales" class="w-16 h-16 rounded-full object-cover" />
                <div>
                  <h3 class="font-semibold text-lg">Johnson Paul</h3>
                  <span class="text-sm text-gray-500 block mb-2">Customer</span>
                  <blockquote class="text-sm text-gray-600 italic">"The best car rental experience I've ever had. Highly recommended!"</blockquote>
                </div>
              </div>
            </div>
          </div>

          <!-- Pagination -->
          <div class="swiper-pagination mt-6 relative!"></div>

          <!-- Navigation buttons
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->
        </div>
      </div>
    </section>
    <!-- testimonial -->

@endsection