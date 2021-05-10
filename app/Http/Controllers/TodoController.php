<?php

namespace App\Http\Controllers;

use App\Models\todo;
use App\Models\User;
use Illuminate\Http\Request;





class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $todos = auth()->user()->todos()->orderBy("completed")->get();
        return view('todos.index',compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }
    public function store(Request $request)
    {
         $request->validate([
        'title' => 'required|max:255',
       ]);

        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('success',"Todo Created Successfully");
    }

    public function update(Request $request, Todo $todo){

        $request->validate([
            'title'=>'required|max:255',
        ]);

        $todo->update(['title'=>$request->title]);
        return redirect(route('todos.index'))->with('success','Todo Updated Successfully');

    }
    public function complete(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('success',"Todo Completed Successfully");

        }
    public function incomplete(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('info',"Back to Incomplete Successfully");

    }
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('info',"Todo deleted Successfully");
    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }
}
