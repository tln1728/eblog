<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog and Magazine HTML Template</title>
    @include('client.partials.css')
</head>

<body class="home-one">
    <!-- Start Header Area -->

        <!-- Start Top Header Area -->
        <header class="eblog-header-area header--sticky">

            @include('client.partials.header-top')

            @include('client.partials.nav')

        </header>
        <!-- End Top Header Area -->

    @include('client.partials.popup-sub')
    
    @include('client.partials.sidebar')
     
    <!-- End Header Area -->

    @yield('banner')
    
    @yield('trending-slide')
    
    @yield('featured')

    @yield('content')

    @include('client.partials.footer')

    <!--scroll top button-->
    <button class="scroll-top-btn">
        <i class="fa-regular fa-angles-up"></i>
    </button>
    <!--scroll top button end-->

    <div id="anywhere-home"></div>

    @include('client.partials.js')

</body>

</html>