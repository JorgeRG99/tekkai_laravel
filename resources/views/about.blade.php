<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/navbar/favicon.ico')}}" type="image/x-icon">
    @vite(['resources/sass/about_vw.scss', 'resources/js/navbar.js'])
    <title>SUSHI HOME</title>
</head>

<body>
    <header>
        <x-navbar></x-navbar>
    </header>
    <main>
        <x-ourstory></x-ourstory>
        <x-ourphilosophy></x-ourphilosophy>
    </main>
    <x-footer></x-footer>
</body>
</html>

