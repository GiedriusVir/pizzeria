<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Ingridient;
use App\Product;
use App\ProductIngridient;

class ProductIngridientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('p-ingridient.index', [
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
        $ingridients = Ingridient::all();
        $groups = Group::all();
        return view('p-ingridient.create', [
            'ingridients' => $ingridients,
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
        $products = Product::where('group_id', $request->product_name)->get();
        
        foreach ($products as $product) {
            foreach ($request->ingridient as $item) {
                $p_ingridient = new ProductIngridient;
                $p_ingridient->product_id = $product->id;
                $p_ingridient->ingridient_id = $item;
                $p_ingridient->save();
            }
        }

        return redirect()->route('p-ingridient.index');
        // dd($p_ingridient);
        // dd($request->all());

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
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $ingridients = Ingridient::all();
        
        return view('p-ingridient.edit', [
            'ingridients' => $ingridients,
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $products = $group->groupProducts;

        foreach ($products as $product) {
            foreach ($product->productIngridients as $item) {
                $item->delete();
            }
            
            foreach ($request->ingridient as $ingridient) {
                $p_ingridient = new ProductIngridient;
                $p_ingridient->product_id = $product->id;
                $p_ingridient->ingridient_id = $ingridient;
                $p_ingridient->save();
            }
        }

       return redirect()->route('p-ingridient.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
