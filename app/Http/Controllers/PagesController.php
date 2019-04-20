<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('pages.index');
    }

    public function adoptionList(){
        return view('animals');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function contact(){
        return view('pages.contact');
    }
}
