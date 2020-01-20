<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('title')->get();
        return view('group.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
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
            'group_title' => ['required', 'min:3', 'max:64'],
            'group_priority' => ['required', 'min:1', 'max:64'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('group.create')->withErrors($validator);
        }

        $group = new Group;
        $group->title = $request->group_title;
        $group->priority = $request->group_priority;
        $group->save();
        return redirect()->route('group.index')->with('success_message', 'Successfully recorded.');
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
    public function edit(Group $group)
    {
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $validator = Validator::make($request->all(),
            [
            'group_title' => ['required', 'min:3', 'max:64'],
            'group_priority' => ['required', 'min:1', 'max:64'],
            ]
        );

        if ($validator-> fails()) {
            $request->flash();
            return redirect()->route('group.create')->withErrors($validator);
        }

        $group->title = $request->group_title;
        $group->priority = $request->group_priority;
        $group->save();
        return redirect()->route('group.index')->with('success_message', 'Successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if ($group->groupProducts->count()) {
            return redirect()->route('group.index')->with('info_message', 'Cannot be deleted because the product group
             category contains products.');
        }

        $group->delete();
        return redirect()->route('group.index')->with('success_message', 'Successfully deleted.');
    }
}
