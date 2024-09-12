<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan News
        $news = News::latest()->paginate(5);
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;

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
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Redirect Update News
        $news = News::find($id);
        return view('admin.news.create_news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Update Aboute
        $this->validate($request, [
            'image' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $news = News::find($id); News::findOrFail($id);
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;

        // upload image
        $images = $request->file('image');
        $images->storeAs('public/news/', $images->hashName());

        // delete produk
        Storage::delete('public/news/' . $news->image);

        $news->image = $images->hashName();

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
        $news = News::findOrFail($id);
        Storage::delete('public/news/' . $news->image);
        $news->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('news.index');
    }
}
