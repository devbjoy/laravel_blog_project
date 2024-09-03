<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
   
    
    <!-- swiper js link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
      <!-- font awsome link -->
      <link rel="stylesheet" href="{{ asset('/front-asset/css/all.min.css') }}">
    
    <!-- tailwind css link -->
    <link rel="stylesheet" href="{{ asset('/front-asset/css/output.css') }}" type="text/css">
    <!-- custom css link -->
    <link rel="stylesheet" href="{{ asset('/front-asset/css/custom.css') }}" type="text/css">

     @yield('style')

</head>
<body>
   

    <header> 
        @include('front.layouts.navbar')
    </header>
    
    {{-- slider section --}}

    @yield('slider')

    {{-- main content section --}}
    @yield('content')

    <div>
        @include('front.layouts.footer')
    </div>

    
     <!-- swiper js link -->
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

     
     <!-- jquery link -->
     <script src="{{ asset('front-asset/js/jquery-3.7.1.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('front-asset/js/custom.js') }}"></script>

    @yield('customJs')

</body>
</html>