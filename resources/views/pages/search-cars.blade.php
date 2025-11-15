@extends('layouts.app')

@section('title', 'RentCars | Search Cars')

@section('content')
 <section class="flex flex-col pt-32 pb-16 px-4 sm:px-12 md:px-14 xl:px-16 bg-gray-50 min-h-screen">
      <!-- Judul -->
    <div class="text-center space-y-2 mb-12 md:mb-20">
        <h2 class="font-bold text-3xl md:text-4xl">Available <span class="text-blue-500">Cars</span></h2>
        <p class="text-sm text-gray-500">
            Cars available for your selected date range.
        </p>
    </div>

      <!-- Grid Card -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card -->
       @forelse($cars as $car)
        <div class="card bg-white shadow-xl rounded-2xl overflow-hidden relative hover:shadow-2xl transition flex flex-col">

            <img src="{{ asset('storage/' . $car->thumbnail) }}"
                alt="{{ $car->name }}"
                class="w-full md:h-52 h-auto object-cover rounded-lg p-4 @if($car->status === 'rented') opacity-50 @endif" />

            <div class="p-6 flex flex-col justify-between grow">
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

                <div class="flex items-center justify-between pt-6">
                    <p class="text-gray-800 font-bold text-lg">
                        Rp {{ number_format($car->price_per_day, 0, ',', '.') }}
                        <span class="text-sm text-gray-500">/day</span>
                    </p>
                        {{-- TOMBOL RENT NOW --}}
                        <button 
                            class="rentNowBtn bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 transition font-medium"
                            data-id="{{ $car->id }}"
                            data-name="{{ $car->name }}"
                            data-thumbnail="{{ asset('storage/' . $car->thumbnail) }}"
                            data-price="{{ $car->price_per_day }}"
                            data-seats="{{ $car->seats }}"
                            data-fuel="{{ $car->fuel_type }}"
                            data-transmission="{{ $car->transmission }}"
                        >
                            Rent Now
                        </button>
                </div>
            </div>
        </div>
        @empty
            <div class="col-span-full flex justify-center">
                <p class="text-gray-500">No cars available for the selected date.</p>
            </div>
        @endforelse
      </div>
    </section>
@endsection
