@extends('layouts.app')

@section('title', 'RentCars | Payment')

@section('content')

<!-- Payment Section -->
    <section class="max-w-6xl mx-auto px-6 pt-32 pb-16 grid grid-cols-1 lg:grid-cols-2 gap-10">
      <!-- Kiri: Ringkasan Rental -->
      <div class="bg-white rounded-xl shadow-md p-6 space-y-5">
        <h2 class="text-2xl font-semibold text-gray-800 border-b pb-3">Rental Summary</h2>

        <div class="flex flex-col md:flex-row gap-5 items-center">
          <img src="{{ asset('storage/' . $rental->car->thumbnail) }}" alt="{{ $rental->car->name }}" class="w-auto h-28 object-cover rounded-lg" />
          <div class="text-center md:text-start">
            <h3 class="text-lg font-semibold text-gray-800">{{ $rental->car->name }}</h3>
            <p class="text-sm text-gray-500">{{ $rental->car->transmission }} | {{ $rental->car->fuel_type }} | {{ $rental->car->seats }} Seats</p>
            <p class="text-blue-600 font-semibold mt-1">Rp {{ number_format($rental->car->price_per_day, 0, ',', '.') }} / day</p>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
          <div>
            <p class="font-semibold">Pick Up Date</p>
            <p>{{ \Carbon\Carbon::parse($rental->pickup_date)->format('d-m-Y') }}</p>
          </div>
          <div>
            <p class="font-semibold">Return Date</p>
            <p>{{ \Carbon\Carbon::parse($rental->return_date)->format('d-m-Y') }}</p>
          </div>
          <div>
            <p class="font-semibold">Total Days</p>
            <p>{{ $totalDays }}</p>
          </div>
          <div>
            <p class="font-semibold">Total Price</p>
            <p class="text-blue-600 font-semibold">Rp {{ number_format($rental->total_price, 0, ',', '.') }}</p>
          </div>
        </div>
      </div>

      <!-- Kanan: Pembayaran -->
      <div class="bg-white rounded-xl shadow-md p-6 space-y-6">
        <h2 class="text-2xl font-semibold text-gray-800 border-b pb-3">Payment Details</h2>

    <form action="{{ route('front.payment.store', $rental) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
        @csrf

            <input type="hidden" name="total_amount" value="{{ $rental->total_price }}">

          <div>
            <label class="block font-medium text-gray-700 text-sm mb-1">Full Name</label>
            <input type="text" placeholder="Enter your name" readonly value="{{ $name }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:ring-2 focus:ring-blue-400" />
          </div>

          <div>
            <label class="block font-medium text-gray-700 text-sm mb-1">Email</label>
            <input type="email" placeholder="Enter your email" readonly value="{{ $email }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:ring-2 focus:ring-blue-400" />
          </div>

          <div>
            <label class="block font-medium text-gray-700 text-sm mb-1">Phone Number</label>
            <input type="text" placeholder="Enter your phone number" readonly value="{{ $phone }}" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:ring-2 focus:ring-blue-400" />
          </div>

          <div>
            <label class="block font-medium text-gray-700 text-sm mb-2">Payment Method</label>
            <div class="space-y-2">
              <label class="flex items-center gap-3">
                <img src="{{ asset('assets/images/bca.png') }}" alt="bca" class="w-14" />
                <div class="flex flex-col">
                  <span>Virtual Account BCA</span>
                  <span>0101-2345-6789</span>
                </div>
              </label>
              <label class="flex items-center gap-3">
                <img src="{{ asset('assets/images/mandiri.png') }}" alt="mandiri" class="w-14" />
                <div class="flex flex-col">
                  <span>Virtual Account Mandiri</span>
                  <span>0202-4338-1234</span>
                </div>
              </label>
            </div>
          </div>

          <div>
            <label class="block font-medium text-gray-700 text-sm mb-1">proof of payment</label>
            <input type="file" name="proof" class="border border-gray-300 rounded-lg w-full py-2 px-4 focus:ring-2 focus:ring-blue-400" />
          </div>

          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white w-full py-3 rounded-lg font-semibold transition-all">Pay Now</button>
        </form>
      </div>
    </section>

@endsection