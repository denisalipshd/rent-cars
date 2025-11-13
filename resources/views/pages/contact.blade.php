@extends('layouts.app')

@section('title', 'RentCars | Contact')

@section('content')

<!-- Contact Section -->
    <section class="px-4 sm:px-12 md:px-14 xl:px-16 pt-32 pb-16 min-h-screen bg-gray-50">
      <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Text & Info -->
        <div class="space-y-6">
          <h2 class="text-3xl md:text-4xl font-bold">Get in <span class="text-blue-500">Touch</span></h2>
          <p class="text-gray-600 leading-relaxed">Need help or want to rent a car? We're ready to help. Contact us using the form below or through the contact information below.</p>

          <div class="space-y-4 pt-4">
            <div class="flex items-center gap-4">
              <i class="fa-solid fa-phone text-blue-500 text-xl"></i>
              <p class="text-gray-700">+62 812-3456-7890</p>
            </div>
            <div class="flex items-center gap-4">
              <i class="fa-solid fa-envelope text-blue-500 text-xl"></i>
              <p class="text-gray-700">support@rentcars.com</p>
            </div>
            <div class="flex items-center gap-4">
              <i class="fa-solid fa-location-dot text-blue-500 text-xl"></i>
              <p class="text-gray-700">Jl. Merdeka No. 45, Jakarta, Indonesia</p>
            </div>
          </div>

          <!-- Optional Map -->
          <div class="pt-6">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.659431953463!2d106.82274527499118!3d-6.175387093811278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e6bcd1b011%3A0x85d1b41b2ad07e73!2sMonas!5e0!3m2!1sen!2sid!4v1696589734822!5m2!1sen!2sid"
              width="100%"
              height="250"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
            >
            </iframe>
          </div>
        </div>

        <!-- Form -->
        <form class="bg-white shadow-xl rounded-2xl p-8 space-y-5">
          <h3 class="text-2xl font-bold mb-2 text-center text-blue-500">Send a Message</h3>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Your name" />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="you@example.com" />
          </div>

          <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea id="message" rows="5" class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Write your message..."></textarea>
          </div>

          <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition">Send Message</button>
        </form>
      </div>
    </section>

@endsection