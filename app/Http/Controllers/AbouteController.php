<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use Validator;
use App\Models\Aboute;
use Illuminate\Http\Request;

class AbouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Aboute
        $aboutes = Aboute::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.aboute.index_aboute', compact('aboutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect ke Halaman Add aboute
        return view('admin.aboute.create_aboute');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Add Aboute
        $this -> validate($request, [
            'image'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
            'title'=> 'required',
            'subtitle'=> 'required',
        ]);

        $aboutes = new Aboute();
        $aboutes -> title = $request -> title;
        $aboutes -> subtitle = $request -> subtitle;

        // Upload Image
        $images = $request->file('image');
        $images -> storeAs('public/aboutes', $images->hashName());
        $aboutes -> image = $images->hashName();

        $aboutes -> save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);

        return redirect()->route('aboute.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Aboute $aboute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Redirect ke Halaman Update
        $aboutes = Aboute::findOrFail($id);
        return view('admin.aboute.update_aboute', compact('aboutes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Update Aboute
        $this->validate($request, [
            'image' => 'required',
            'title'=> 'required',
            'subtitle'=> 'required',
        ]);

        $aboutes = Aboute::findOrFail($id);
        $aboutes -> title = $request -> title;
        $aboutes -> subtitle = $request -> subtitle;

        // upload image
        $images = $request->file('image');
        $images->storeAs('public/aboutes/', $images->hashName());

        // delete produk
        Storage::delete('public/aboutes/'. $aboutes->image);

        $aboutes->image = $images->hashName();

        $aboutes->save();
        Alert::success('Success', 'Data updated successfully')->autoClose(2000);

        return redirect()->route('aboute.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete Aboute
        $aboutes = Aboute::findOrFail($id);
        Storage::delete('public/aboutes/'. $aboutes->foto);
        $aboutes->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('aboute.index');
    }
}