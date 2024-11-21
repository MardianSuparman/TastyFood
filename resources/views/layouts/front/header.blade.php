{{-- Header --}}
<div class="background-image">
    <div class="container pt-4">
        <div class="head"></div>
        <nav class="navbar navbar-expand-lg pe-5">
            <h1><a class="navbar-brand" href="{{ url('/') }}">TASTY FOOD</a></h1>
            <button class="navbar-toggler" type="button" id="sidebarToggle" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-white"></i>
            </button>
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

    @yield('TitleContent')
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
