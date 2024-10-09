{{-- Header --}}
<div class="background-image">
    <div class="container pt-4">
        <div class="head"></div>
        <nav class="navbar navbar-expand-lg pe-5">
            <h1><a class="navbar-brand" href="{{ url('/') }}">TASTY FOOD</a></h1>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">TENTANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery') }}">GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">KONTAK</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('TitleContent')
</div>
