@extends('layouts.ui')
@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>GALLERI KAMI</b></h1>
    </div>
@endsection
@section('content')
    <!-- Carousel -->
    <section class="slider">
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
    </section>

    <section class="photo">
        <div class="container container-img">
            <div class="row">
                @php $galeries = App\Models\Galery::orderBy('id', 'desc')->get(); @endphp
                @foreach ($galeries->take(8) as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('/storage/galerys/' . $item->image) }}" class="rounded-img" alt="Food">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
