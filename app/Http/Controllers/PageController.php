<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Group;
use App\Type;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $groups = Group::all();
        $types = Type::all();

        $cart = Session::get('cart', collect());

        $counts = $cart->countBy('id')->toArray();

        // dd($c);

        $cart = $cart->unique('id')->each(function ($item) use ($counts) {
            $item->count = $counts[$item->id];
        });


        return view('front.index', [
            'products' => $products,
            'groups' => $groups,
            'types' => $types,
            'cart' => $cart
            ]);
    } 
}
