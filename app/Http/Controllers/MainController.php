<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        return view('main.index');
    }


    public function menu()
    {
        return view('main.menu');
    }

    public function about()
    {
        return view('main.about');
    }
    public function contact()
    {
        return view('main.contact');
    }
    public function login()
    {
        return view('main.login');
    }
    public function registro()
    {
        return view('main.registro');
    }
    public function cart()
    {
        return view('main.cart');
    }
    public function checkout()
    {
        return view('main.checkout');
    }
}
