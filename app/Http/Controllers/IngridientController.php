<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingridient;
use Validator;

class IngridientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingridients = Ingridient::all();
        return view('ingridient.index', ['ingridients' => $ingridients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingridient.create');
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
            'ingridient_title' => ['required'],
            'ingridient_type' => ['required', 'min:0', 'max:1'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('ingridient.create')->withErrors($validator);
        }

        $ingridient = new Ingridient;
        $ingridient->title = $request->ingridient_title;
        $ingridient->type = $request->ingridient_type;
        $ingridient->save();

        return redirect()->route('ingridient.index')->with('success_message', 'Successfully recorded');

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
    public function edit(Ingridient $ingridient)
    {
        return view('ingridient.edit', ['ingridient' => $ingridient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingridient $ingridient)
    {
        $validator = Validator::make($request->all(),
            [
            'ingridient_title' => ['required'],
            'ingridient_type' => ['required', 'min:0', 'max:1'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('ingridient.create')->withErrors($validator);
        }

        $ingridient->title = $request->ingridient_title;
        $ingridient->type = $request->ingridient_type;
        $ingridient->save();

        return redirect()->route('ingridient.index')->with('success_message', 'Successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingridient $ingridient)
    {
        $ingridient->delete();
        return redirect()->route('ingridient.index')->with('success_message', 'Successfully deleted');
    }
}
