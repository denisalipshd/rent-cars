<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="{{ asset('./assets/css/output.css') }}" /> --}}
    @vite('resources/css/app.css')

    <!-- font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
  </head>
  <body class="font-sans">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Overlay & Popup Modal -->
    @include('includes.overlay-car')

    @yield('content')

    <!-- footer start -->
    @include('includes.footer')
    <!-- footer end -->

    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('./assets/js/script.js') }}"></script>
  </body>
</html>
