<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Group;
use App\Type;

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


        return view('front.index', [
            'products' => $products,
            'groups' => $groups,
            'types' => $types
            ]);
    } 
}
