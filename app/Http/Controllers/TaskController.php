<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todolist;

class TaskController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alltasks = todolist::all();

        return view('tasks')->with('alltasks', $alltasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'details' => 'required',
            'date'    => 'required',
            'time'    => 'required',
        ]);

        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
        $todolists_obj = new todolist();
        $todolists_obj->name     = $request->name;
        $todolists_obj->task     = $request->details;
        $todolists_obj->status   = "1";
        $todolists_obj->deadline = $combinedDT;

        //if data stored succesuly
        if ($todolists_obj->save()) {
            Session()->flash('status', "Task is Added!");
        } else {
            Session()->flash('status', "Somrthing went wrong , please try again later!");
        }

        return (redirect('/tasks'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
