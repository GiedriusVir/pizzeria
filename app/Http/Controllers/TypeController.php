<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('priority')->get();
        return view('type.index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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
            'type_title' => ['required', 'min:3', 'max:64'],
            'type_priority' => ['required', 'min:1', 'max:64'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('type.create')->withErrors($validator);
        }

        $type = new Type;
        $type->title = $request->type_title;
        $type->priority = $request->type_priority;
        $type->save();
        return redirect()->route('type.index')->with('success_message', 'Successfully recorded.');
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
    public function edit(Type $type)
    {
        return view('type.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {

        $validator = Validator::make($request->all(),
            [
            'type_title' => ['required', 'min:3', 'max:64'],
            'type_priority' => ['required', 'min:1', 'max:64'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('type.create')->withErrors($validator);
        }

        $type->title = $request->type_title;
        $type->priority = $request->type_priority;
        $type->save();
        return redirect()->route('type.index')->with('success_message', 'Successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {

        if ($type->productOfType->count()) {
            return redirect()->route('type.index')->with('info_message', 'Cannot be deleted because the product type category contains products.');
        }

        $type->delete();
        return redirect()->route('type.index')->with('success_message', 'Successfully deleted.');
    }
}
