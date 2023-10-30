<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/img/navbar/favicon.ico')}}" type="image/x-icon">
    @vite(['resources/sass/bookings_vw.scss', 'resources/js/navbar.js', 'resources/js/bookings.js'])
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <title>SUSHI HOME</title>
</head>
<body>
    <header>
        <x-navbar></x-navbar>
    </header>
    <main>
        <div class="form_img_box">
            <img src="{{asset('assets/img/bookings/booking_img.png')}}" width="100%" alt="">
        </div>
        <x-bookingdate></x-bookingdate>
        <x-bookingdataform></x-bookingdataform>
    </main>
    <x-footer></x-footer>
</body>
</html>

