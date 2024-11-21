<?php

namespace App\Http\Controllers;

use App\Models\Aboute;
use App\Models\Galery;
use App\Models\News;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function about()
    {
        $food = Aboute::find(1);
        $visi = Aboute::find(2);
        $misi = Aboute::find(3);

        return view('front.about', compact('food', 'visi', 'misi'));
    }
    public function news()
    {

        $latestNews = News::orderBy('created_at', 'desc')->first(); // Mengambil berita terbaru
        $otherNews = News::orderBy('created_at', 'desc')->skip(1)->take(4)->get(); // Mengambil 4 berita berikutnya

        return view('front.news', compact('latestNews', 'otherNews'));
    }
    public function postNews($slug)
    {
        // Mencari berita berdasarkan slug
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            // Menangani kasus jika berita tidak ditemukan
            abort(404, 'News not found');
        }

        // Mengirimkan data berita ke view
        return view('front.post_news', compact('news'));
    }
    public function loadNewsMore(Request $request)
    {
        $skip = $request->input('skip', 0); // Get the current skip value
        $news = News::orderBy('id', 'desc')->skip($skip)->take(8)->get(); // Load next 8 items

        return response()->json($news);
    }
    public function loadGalleryMore(Request $request)
    {
        $skip = $request->input('skip', 0);
        $galeries = Galery::orderBy('id', 'desc')->skip($skip)->take(value: 4)->get();

        return response()->json($galeries);
    }
    public function gallery()
    {
        return view('front.gallery');
    }
    public function contact()
    {
        return view('front.contact');
    }
}
