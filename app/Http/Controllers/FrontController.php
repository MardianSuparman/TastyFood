<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function about() {
        return view('front.about');
    }
    public function news() {
        return view('front.news');
    }
    public function gallery() {
        return view('front.gallery');
    }
    public function contact() {
        return view('front.contact');
    }
}
