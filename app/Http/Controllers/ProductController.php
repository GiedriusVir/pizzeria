<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Group;
use App\Product;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $types = Type::all();
        $groups = Group::all();
        return view('product.index', [
            'products' => $products,
            'types' => $types,
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $groups = Group::all();
        return view('product.create', [
            'types' => $types,
            'groups' => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
            'product_size' => ['required', 'min:3', 'max:64'],
            'product_price' => ['required'],
            'product_discount' => ['required'],
            'product_priority' => ['required'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('product.create')->withErrors($validator);
        }

        // photo
        $file = $request->file('product_photo');
        $file_name = $file->getClientOriginalName();

        //Move Uploaded File
        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);

        $product = new Product;
        $product->type_id = $request->product_type;
        $product->size_title = $request->product_size;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->discount = $request->product_discount;
        $product->photo = $file_name;
        $product->priority = $request->product_priority;
        $product->group_id = $request->product_group;
        $product->save();

        return redirect()->route('product.index')->with('success_message', 'Successfully recorded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $groups = Group::all();
        return view('product.edit', [
            'product' => $product,
            'types' => $types,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(),
            [
            'product_size' => ['required', 'min:3', 'max:64'],
            'product_price' => ['required'],
            'product_discount' => ['required'],
            'product_priority' => ['required'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('product.create')->withErrors($validator);
        }

        // photo
        $file = $request->file('product_photo');
        $file_name = $file->getClientOriginalName();

        //Move Uploaded File
        $destinationPath = public_path() . '/img';
        $file->move($destinationPath, $file_name);

        $product->type_id = $request->product_type;
        $product->size_title = $request->product_size;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->discount = $request->product_discount;
        $product->photo = $file_name;
        $product->priority = $request->product_priority;
        $product->group_id = $request->product_group;
        $product->save();

        return redirect()->route('product.index')->with('success_message', 'Successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success_message', 'Successfully deleted.');
    }
}
