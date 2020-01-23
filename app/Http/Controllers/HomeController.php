<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Paysera;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test(Paysera $paysera)
    {

        return view('paysera.form');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pay(Request $request, Paysera $paysera)
    {
        $paysera->pay($request->email, $request->amount); // Laravelis "nuluzta";
        
    }


}
