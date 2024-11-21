<?php

namespace App\Http\Controllers;

use Storage;
use Alert;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Sliders
        $sliders = Slider::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.slider.index_slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect to page add data slider
        return view('admin.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menambah data Sliders
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $sliders = new Slider();

        // Upload Images
        $images = $request->file('image');
        $images->storeAs('public/sliders', $images->hashName());
        $sliders->image = $images->hashName();
        $sliders->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //redirect ke halaman Update
        $sliders = Slider::findOrFail($id);
        return view('admin.slider.update_slider', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //MengUpdate data slider
        $this->validate($request, [
            'image' => 'required',
        ]);

        $sliders = Slider::findOrFail($id);

        // upload image
        $images = $request->file('image');
        $images->storeAs('public/sliders/', $images->hashName());

        // delete produk
        Storage::delete('public/sliders/'. $sliders->image);

        $sliders->image = $images->hashName();
        $sliders->save();
        Alert::success('Success', 'Data updated successfully')->autoClose(2000);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //Delete data slider
        $sliders = Slider::findOrFail($id);
        Storage::delete('public/sliders/' . $sliders->image);
        $sliders->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');

        return redirect()->route('slider.index');
    }
}
