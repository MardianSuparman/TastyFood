<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menempilkan Contact
        $contacts = Contact::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.contact.index_contact', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect Add Contact
        return view('admin.contact.create_contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Add Contact
        $this->validate($request, [
            'NoTlpn'=> 'required',
            'email'=> 'required',
            'adres'=> 'required',
        ]);

        $contacts = new Contact();
        $contacts->NoTlpn = $request->NoTlpn;
        $contacts->email = $request->email;
        $contacts->adres = $request->adres;
        $contacts->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //Redirect Update
        $contacts = Contact::findOrFail($id);
        return view('admin.contact.update_contact', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Update Contact
        $this->validate($request, [
            'NoTlpn'=> 'required',
            'email'=> 'required',
            'adres'=> 'required',
        ]);

        $contact =  Contact::findOrFail($id);
        $contact->NoTlpn = $request->NoTlpn;
        $contact->email = $request->email;
        $contact->adres = $request->adres;
        $contact->save();
        Alert::success('Success', 'Data Updated Successfully')->autoClose(2000);

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //Delete Contact
        $contacts = Contact::findOrFail($id);
        $contacts->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('contact.index');

    }
}
