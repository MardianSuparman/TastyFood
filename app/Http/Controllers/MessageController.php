<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data
        $messages = Message::latest()->paginate(10);
        confirmDelete("Delete", "Are you sure you want to delete?");

        return view('admin.message.index_message', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ADD Message
        $this->validate( $request, [
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);

        $message = new Message();
        $message->name =$request->name;
        $message->email =$request->email;
        $message->message =$request->message;
        $message->save();
        Alert::toast('Succes', 'message sent successfully')->success('Succes', 'message sent successfully');


        return redirect()->route('contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //Delete Message
        $messages = Message::findOrFail($id);
        $messages->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('message.index');
    }
}
