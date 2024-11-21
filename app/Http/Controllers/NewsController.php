<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use App\Models\News as Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan News
        $news = Berita::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.news.index_news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect ke halaman Add News
        return view('admin.news.create_news');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Add News
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new Berita();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->deskripsi = $request->deskripsi;

        // Upload Image
        $images = $request->file('image');
        $images->storeAs('public/news', $images->hashName());
        $news->image = $images->hashName();

        $news->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Redirect Update News
        $news = Berita::findOrFail($id);
        return view('admin.news.update_news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Update Aboute
        $this->validate($request, [
            'image' => 'nullable|image|max:2048',
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = Berita::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->deskripsi = $request->deskripsi;

        // Tangani unggah gambar jika gambar baru disediakan
        if ($request->hasFile('image')) {
            // Unggah gambar baru
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/news', $image->hashName());

            // Hapus gambar lama jika ada
            if ($news->image && Storage::exists('public/news/' . $news->image)) {
                Storage::delete('public/news/' . $news->image);
            }

            // Simpan nama file gambar baru
            $news->image = $image->hashName();
        }

        // // upload image
        // $images = $request->file('image');
        // $images->storeAs('public/news/', $images->hashName());

        // // delete image
        // Storage::delete('public/news/' . $news->image);

        // $news->image = $images->hashName();

        $news->save();
        Alert::success('Success', 'Data updated successfully')->autoClose(2000);

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete News
        $news = Berita::findOrFail($id);
        Storage::delete('public/news/' . $news->image);
        $news->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('news.index');
    }
}
