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
        //
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
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);

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
    public function destroy(Message $message)
    {
        //
    }
}
