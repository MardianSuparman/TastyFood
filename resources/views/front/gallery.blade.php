@extends('layouts.ui')
@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>GALLERI KAMI</b></h1>
    </div>
@endsection
@section('content')
    <!-- Carousel -->
    
    {{-- <section class="slider">
        <div id="foodCarousel" class="carousel slide content-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/front/assets/img/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
                        class="d-block img-fluid" alt="Food 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/front/assets/img/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
                        class="d-block img-fluid" alt="Food 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/front/assets/img/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
                        class="d-block img-fluid" alt="Food 3">
                </div>
            </div>
            <!-- Previous Button with Font Awesome Icon -->
            <button class="carousel-control-prev" type="button" data-bs-target="#foodCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon">
                    <i class="fas fa-chevron-left"></i>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!-- Next Button with Font Awesome Icon -->
            <button class="carousel-control-next" type="button" data-bs-target="#foodCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </section> --}}

    <section class="slider">
        <div id="foodCarousel" class="carousel slide content-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $sliders = App\Models\Slider::get();
                @endphp
                @forelse ($sliders as $item)
                    <div class="carousel-item active">
                        <img src="{{ asset('/storage/sliders/' . $item->image) }}" class="d-block img-fluid" alt="Food 1">
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Data slider belum tersedia.
                        </div>
                    </div>

                @endforelse
            </div>

            <div class="carousel-controls">
                <!-- Previous Button with Font Awesome Icon -->
                <button class="carousel-control-prev" type="button" data-bs-target="#foodCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <!-- Next Button with Font Awesome Icon -->
                <button class="carousel-control-next" type="button" data-bs-target="#foodCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="photo">
        <div class="container container-img">
            <h2 class="photo-title mb-4"><b>GALERI FOTO</b></h2>
            <div class="row" id="photo-container">

                @php
                    $galeries = App\Models\Galery::orderBy('created_at', 'desc')->paginate(8);
                @endphp

                @forelse ($galeries as $item)
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-4 justify-content-center align-items-center">
                        <img src="{{ asset('/storage/galerys/' . $item->image) }}" class="rounded-img img-fluid"
                            alt="Photo">
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Data galeri belum tersedia.
                        </div>
                    </div>
                @endforelse

            </div>

            <div class="bottom">
                @if ($galeries->count() > 4)
                    <a href="#" id="loadMorePhotos" onclick="loadMorePhotos(event)" class="btn-more">Lihat Lebih
                        Banyak</a>
                @endif
            </div>

        </div>
    </section>

    <script>
        let photoSkip = {{ $galeries->count() }}; // Mulai dengan jumlah galeri yang ada

        function loadMorePhotos(event) {
            event.preventDefault(); // Mencegah perilaku default link
            fetch(`{{ route('gallerysLoad') }}?skip=${photoSkip}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Untuk melihat data yang diterima
                    const photoContainer = document.getElementById('photo-container');
                    data.forEach(item => {
                        const newItem = document.createElement('div');
                        newItem.className = 'col-12 col-lg-3 col-md-4 col-sm-6 mb-4 justify-content-center';
                        newItem.innerHTML =
                            `<img src="{{ asset('/storage/galerys/') }}/${item.image}" class="rounded-img" alt="Photo">`;
                        photoContainer.appendChild(newItem);
                    });
                    photoSkip += data.length; // Increment skip untuk pemuatan berikutnya
                    if (data.length < 4) {
                        document.getElementById('loadMorePhotos').style.display =
                            'none'; // Sembunyikan jika tidak ada lagi
                    }
                })
                .catch(error => console.error('Error loading more photos:', error));
        }
    </script>

@endsection
