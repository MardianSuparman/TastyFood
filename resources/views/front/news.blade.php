@extends('layouts.ui')
@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>BERITA KAMI</b></h1>
    </div>
@endsection
@section('content')
    <section class="news-content">
        <div class="container">
            <div class="row">
                <!-- Bagian Gambar Misi -->
                <div class="col-12 col-md-6 mb-4">
                    <img src="{{ asset('assets/front/assets/img/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="News Image"
                        class="img-fluid rounded-image-news">
                </div>
                <!-- Bagian Teks Misi -->
                <div class="col-12 col-md-6  text-content-news">
                    <h3><b>APA SAJA MAKANAN KHAS NUSANTARA?</b></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus
                        tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et
                        suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio.
                        Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante
                        volutpat</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus
                        tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et
                        suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio.
                        Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante
                        volutpat</p>

                    <a href="#" class="btn-black"><b>BACA SELENGKAPNYA</b></a>
                </div>
            </div>
        </div>
    </section>

    <section class="news-other">
        <div class="container container-news">
            <h2 class="news-other-title mb-5"><b>BERITA LAINNYA</b></h2>
            <div class="row" id="news-container" class="news-content-roow">

                @php
                    $news = App\Models\News::orderBy('created_at', 'desc')->paginate(8);
                    // $duplicatedNews = $news->concat($news)
                @endphp

                @foreach ($news as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="news-card">
                            <div class="aspect-ratio">
                                <img src="{{ asset('/storage/news/' . $item->image) }}" class="news-img-top"
                                    alt="Food Image">
                            </div>
                            <div class="news-body">
                                <h5 class="news-title">{{ Str::limit($item->title, 15, '...') }}</h5> <!-- Batasi judul -->
                                <p class="news-text">{{ Str::limit($item->content, 100, '...') }}</p> <!-- Batasi konten -->
                                <a href="{{ route('postNews', ['slug' => $item->slug]) }}" class="read-more">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="botten">

                @if ($news->hasMorePages())
                    <a href="#" id="loadMore" onclick="loadMore(event)" class="btn-more">Lihat Lebih Bayak</a>
                @endif

            </div>
        </div>
    </section>

    <script>
        let newsSkip = {{ $news->count() }}; // Mulai dengan jumlah berita yang ada

        // Fungsi untuk memotong teks
        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.slice(0, maxLength) + '...'; // Memotong teks dan menambahkan "..."
            }
            return text; // Jika panjang teks kurang dari batas, biarkan apa adanya
        }

        function loadMore(event) {
            event.preventDefault(); // Mencegah perilaku default link
            fetch(`{{ route('newsLoad') }}?skip=${newsSkip}`)
                .then(response => response.json())
                .then(data => {
                    const newsContainer = document.getElementById('news-container');
                    data.forEach(item => {
                        // Memotong judul dan konten di sini
                        const truncatedTitle = truncateText(item.title, 15); // Batasi judul
                        const truncatedContent = truncateText(item.content, 100); // Batasi konten

                        const newItem = document.createElement('div');
                        newItem.className = 'col-12 col-sm-6 col-md-4 col-lg-3 mb-4';
                        newItem.innerHTML = `
                    <div class="news-card">
                        <div class="aspect-ratio">
                            <img src="{{ asset('/storage/news/') }}/${item.image}" class="news-img-top" alt="Food Image">
                        </div>
                        <div class="news-body">
                            <h5 class="news-title">${truncatedTitle}</h5>
                            <p class="news-text">${truncatedContent}</p>
                            <a href="{{ route('postNews', ['slug' => $item->slug]) }}" class="read-more">Baca selengkapnya</a>
                        </div>
                    </div>`;
                        newsContainer.appendChild(newItem);
                    });
                    newsSkip += data.length; // Increment skip untuk pemuatan berikutnya
                    if (data.length < 8) {
                        document.getElementById('loadMore').style.display = 'none'; // Sembunyikan jika tidak ada lagi
                    }
                })
                .catch(error => console.error('Error loading more news:', error));
        }
    </script>
@endsection
