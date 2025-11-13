<nav class="navbar fixed w-full flex items-center justify-between px-4 py-2 sm:px-12 md:px-16 transition-all duration-300 z-50">
      <!-- Logo -->
      <a href="{{ route('front.index') }}">
        <img src="{{ asset('./assets/images/logo.png') }}" alt="logo" class="w-20 md:w-24" />
      </a>

      <!-- menu nav desktop -->
      <ul class="hidden md:flex justify-center gap-8 list-none">
        <li>
          <a href="{{ route('front.index') }}" class="text-base md:text-lg font-bold text-blue-400 hover:text-blue-500 transition">Home</a>
        </li>
        <li>
          <a href="{{ route('front.rent-cars') }}" class="text-base md:text-lg font-bold hover:text-blue-500 transition">Rent Cars</a>
        </li>
        <li>
          <a href="{{ route('front.about') }}" class="text-base md:text-lg font-bold hover:text-blue-500 transition">About</a>
        </li>
        <li>
          <a href="{{ route('front.contact') }}" class="text-base md:text-lg font-bold hover:text-blue-500 transition">Contact</a>
        </li>
      </ul>

      <!-- hamburger -->
      <div class="md:hidden">
        <button id="hamburger" class="focus:outline-none">
          <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- menu nav mobile -->
      <div id="nav-mobile" class="fixed top-20 right-0 bg-white z-50 w-full px-6 py-6 space-y-4 shadow-sm transition duration-300 ease-in-out
        opacity-0 pointer-events-none transform -translate-y-full">
        <ul class="space-y-3">
          <li class="list-none">
            <a href="{{ route('front.index') }}" class="hover:text-blue-500 text-blue-400 font-bold transition text-base md:text-lg">Home</a>
          </li>
          <li class="list-none">
            <a href="{{ route('front.rent-cars') }}" class="hover:text-blue-500 font-bold transition text-base md:text-lg">Rent Car</a>
          </li>
          <li class="list-none">
            <a href="{{ route('front.about') }}" class="hover:text-blue-500 font-bold transition text-base md:text-lg">About</a>
          </li>
          <li class="list-none">
            <a href="{{ route('front.contact') }}" class="hover:text-blue-500 font-bold transition text-base md:text-lg">Contact</a>
          </li>
        </ul>
      </div>
    </nav>