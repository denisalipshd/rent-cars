<div id="rentModal" class="fixed inset-0 hidden justify-center items-center z-50 bg-black/50 backdrop-blur-sm transition-all duration-300 overflow-y-auto p-4">
      <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg md:max-w-3xl p-5 md:p-8 relative animate__animated animate__fadeInUp">
        <!-- Tombol Close -->
        <button id="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-3xl">&times;</button>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-gray-800 mb-5 text-center">Rent This Car</h2>

        <!-- Isi Modal -->
        <form action="{{ route('front.rentals') }}" method="POST">
          @csrf
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-4">
            <!-- Info Mobil -->
            <div class="text-center flex flex-col items-center justify-center">
              <img src="" alt="Car" class="w-36 h-auto md:w-56 object-contain mb-3" />

              <h3 class="carName text-base md:text-lg font-semibold text-gray-800"></h3>

              <p class="carInfo text-xs md:text-sm text-gray-500 mt-1">
                <span><i class="fa-solid fa-wheelchair text-blue-500"></i> 7 Seats</span>
                |
                <span><i class="fa-solid fa-gear text-blue-500"></i> Manual</span>
                |
                <span><i class="fa-solid fa-gas-pump text-blue-500"></i> Petrol</span>
              </p>

              <p class="carPrice text-blue-600 font-semibold mt-2 text-sm md:text-lg">Rp 450.000 / day</p>
            </div>

            <!-- Form Input -->
            <div class="space-y-3 md:space-y-4">

              <input type="hidden" id="carId" name="car_id">
              <input type="hidden" id="totalPrice" name="total_price">

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" placeholder="Enter your name" name="name" class="border border-gray-300 rounded-lg w-full py-2 px-3 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-sm" required />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" placeholder="example@email.com" name="email" class="border border-gray-300 rounded-lg w-full py-2 px-3 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-sm" required />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="text" placeholder="Enter your phone number" name="phone" class="border border-gray-300 rounded-lg w-full py-2 px-3 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-sm" required />
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Pick Up Date</label>
                  <input type="date" id="pickup_date" name="pickup_date" class="border border-gray-300 rounded-lg w-full py-2 px-3 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-sm" required />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Return Date</label>
                  <input type="date" id="return_date" name="return_date" class="border border-gray-300 rounded-lg w-full py-2 px-3 text-sm md:text-base focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-sm" required />
                </div>
              </div>
            </div>
          </div>

          <!-- Tombol Konfirmasi -->
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white w-full py-3 rounded-lg font-semibold transition-all mt-2">Confirm Rental</button>
        </form>
      </div>
    </div>