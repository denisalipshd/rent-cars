@extends('layouts.app')

@section('title', 'RentCars | About Us')

@section('content')

<!-- About Section -->
    <section class="px-4 sm:px-12 md:px-14 xl:px-16 pt-32 pb-16 bg-gray-50 min-h-screen">
      <div class="max-w-5xl mx-auto text-center space-y-8">
        <h2 class="text-3xl md:text-4xl font-bold">About <span class="text-blue-500">Us</span></h2>

        <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto">
          We are a trusted <span class="font-semibold text-blue-500">Car Rental Service</span> committed to providing the best driving experience for every customer. With a fleet of high-quality vehicles, competitive prices, and friendly
          service, we’re here to accompany your journey — from business trips to vacations.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12">
          <div class="bg-white shadow-md rounded-2xl p-6 space-y-3 hover:shadow-lg transition">
            <i class="fa-solid fa-car text-blue-500 text-3xl"></i>
            <h3 class="font-semibold text-lg">Latest Fleet</h3>
            <p class="text-gray-500 text-sm">We regularly update our fleet to ensure maximum comfort and safety for all our customers.</p>
          </div>

          <div class="bg-white shadow-md rounded-2xl p-6 space-y-3 hover:shadow-lg transition">
            <i class="fa-solid fa-headset text-blue-500 text-3xl"></i>
            <h3 class="font-semibold text-lg">24/7 Support</h3>
            <p class="text-gray-500 text-sm">Our team is always ready to assist you with fast and professional service — anytime, anywhere.</p>
          </div>

          <div class="bg-white shadow-md rounded-2xl p-6 space-y-3 hover:shadow-lg transition">
            <i class="fa-solid fa-tags text-blue-500 text-3xl"></i>
            <h3 class="font-semibold text-lg">Affordable Pricing</h3>
            <p class="text-gray-500 text-sm">Enjoy premium service at affordable rates with no hidden fees or extra charges.</p>
          </div>
        </div>
      </div>
    </section>

@endsection