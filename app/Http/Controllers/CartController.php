<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;

class CartController extends Controller
{
    
    public function add(Product $product) {

        $cart = Session::get('cart', null);

        if ($cart === null) {
            $cart = collect();
        }

        $cart->add($product);

        Session::put('cart', $cart);

        return redirect()->back();

    }

}
