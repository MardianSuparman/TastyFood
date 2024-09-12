<?php

namespace App\Http\Controllers;

Use Alert;
use Storage;
use Validator;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Galery
        $galerys = Galery::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.galery.index_galery', compact('galerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect to page add data Galery
        return view('admin.galery.create_galery');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menambah data Galery
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $galerys = new Galery();

        // Upload Images
        $images = $request->file('image');
        $images->storeAs('public/galerys', $images->hashName());
        $galerys->image = $images->hashName();
        $galerys->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);
        return redirect()->route('galery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galerys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //redirect ke halaman Update
        $galerys = Galery::findOrFail($id);
        return view('admin.galery.update_galery', compact('galerys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //MengUpdate data Galery
        $this->validate($request, [
            'image' => 'required',
        ]);

        $galerys = Galery::findOrFail($id);

        // upload image
        $images = $request->file('image');
        $images->storeAs('public/galerys/', $images->hashName());

        // delete produk
        Storage::delete('public/galerys/'. $galerys->image);

        $galerys->image = $images->hashName();
        $galerys->save();
        Alert::success('Success', 'Data updated successfully')->autoClose(2000);
        return redirect()->route('galery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //Delete data Galery
        $galerys = Galery::findOrFail($id);
        Storage::delete('public/galerys/' . $galerys->image);
        $galerys->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');

        return redirect()->route('galery.index');
    }
}
