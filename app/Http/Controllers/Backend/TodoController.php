<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TodoList;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth:admin');
    }

    public function index()
    {
        $todos = TodoList::all();
        return response()->json(['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        TodoList::create($request->all());
        $todos = TodoList::all();
        return response()->json(['todos'=>$todos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['todo'=>TodoList::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $todo = TodoList::where('id',$request->id)->first();

        if($todo->status == 1){

            $todo->status = 0;
        }else{
            $todo->status = 1;
        }
        
        $todo->save();
        return response()->json(['message'=>'Todo updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $todo = TodoList::find($request->id);
        $todo->todo = $request->todo;
        $todo->save();
        return response()->json(['message'=>'Todo updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        TodoList::find($id)->delete();
        return response()->json([
            'success'=>'todo deleted successfully'
        ],200);
    }
}
