<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TastyFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/frontUi.css') }}">
    <!-- Include the thin variant -->

    @yield('styles')
    @stack('scripts')

    {{-- CDN frontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    {{-- header --}}

    @include('layouts.front.header')

    {{-- <div class="background-image">
        <div class="container pt-4">
            <div class="hero"></div>
            <nav class="navbar navbar-expand-lg pe-5">
                <h1><a class="navbar-brand" href="#">TASTY FOOD</a></h1>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">TENTANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BERITA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">GALERI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">KONTAK</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content">
            <div class="black-line mb-3"></div><br>
            <h1 style="'Poppins', sans-serif" class="mb-3">HEALTHY</h1>
            <h1 style="font-family: Arial, sans-serif; font-weight: bold" class="mb-3"><b>TASTY FOOD</b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui
                diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex.
                Fusce sit amet viverra ante.</p>
            <a href="#" class="btn-black"><b>TENTANG KAMI</b></a>
        </div>
    </div> --}}

    {{-- Main content --}}
    @yield('content')

    {{-- Footer --}}
    @include('layouts.front.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    @stack('script')

    {{-- @include('sweetalert::alert') --}}

</body>

</html>
