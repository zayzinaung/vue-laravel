<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all()->toArray();
        return array_reverse($todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $todo = new Todo([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        $todo->save();
 
        return response()->json('The to-do record is successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());
 
        return response()->json('The to-do record is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
 
        return response()->json('The to-do record is successfully deleted');
    }
}
