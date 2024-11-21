{{-- Header --}}
<div class="background-image">
    <div class="container pt-4">
        <div class="hero"></div>
        <nav class="navbar navbar-expand-lg pe-5">
            <h1><a class="navbar-brand" href="{{ url('/') }}">TASTY FOOD</a></h1>
            <button class="navbar-toggler" type="button" id="sidebarToggle" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
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

        {{-- SIDEBAR --}}
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>TASTY FOOD</h2>
                <button id="closeSidebar" class="close-btn"><i class="fa-solid fa-x fa-2xs"></i></button>
            </div>
            <ul class="navbar-nav">
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

    </div>

    <div class="content">
        <div class="black-line mb-3"></div><br>
        <h1 style="'Poppins', sans-serif" class="mb-3">HEALTHY</h1>
        <h1 style="font-family: Arial, sans-serif; font-weight: bold" class="mb-3"><b>TASTY FOOD</b></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui
            diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex.
            Fusce sit amet viverra ante.</p>
        <a href="{{ route('about') }}" class="btn-black"><b>TENTANG KAMI</b></a>
    </div>
</div>


@push('script')
    <script>
        const toggler = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('closeSidebar');

        // Menampilkan/menghilangkan sidebar saat tombol toggle diklik
        toggler.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        // Menutup sidebar saat tombol close diklik
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('show');
        });
    </script>
@endpush


{{-- <aside class="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-title">TASTY FOOD</span>
            <button class="close-btn">&times;</button>
        </div>
        <ul class="sidebar-nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
            <li><a href="{{ route('news') }}">Berita</a></li>
            <li><a href="{{ route('gallery') }}">Galeri</a></li>
            <li><a href="{{ route('contact') }}">Kontak</a></li>
        </ul>
    </aside> --}}
