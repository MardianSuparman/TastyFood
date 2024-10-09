{{-- Header --}}
<div class="background-image">
        <div class="container pt-4">
            <div class="hero"></div>
            <nav class="navbar navbar-expand-lg pe-5">
                <h1><a class="navbar-brand" href="{{ url('/') }}">TASTY FOOD</a></h1>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
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
        <div class="content">
            <div class="black-line mb-3"></div><br>
            <h1 style="'Poppins', sans-serif" class="mb-3">HEALTHY</h1>
            <h1 style="font-family: Arial, sans-serif; font-weight: bold" class="mb-3"><b>TASTY FOOD</b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui
                diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex.
                Fusce sit amet viverra ante.</p>
            <a href="#" class="btn-black"><b>TENTANG KAMI</b></a>
        </div>
    </div>
