<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = ToDo::orderBy('updated_at', 'DESC')->paginate(3);

        return view('todo.index', [
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create_todo');
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
            'title' => 'required|unique:to_dos|max:800',
            'detail' => 'required',
        ]);

        $slug = SlugService::createSlug(ToDo::class, 'slug', $request->title);
        
        $todo = ToDo::create([
            'slug' => $slug,
            'title' => $request->title,
            'detail' => $request->detail,
            'completed' => 0
        ]);

        return redirect('/todolist')->with('status', 'Your todo created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $todo = ToDo::where('slug', $slug)->first();

        return view('todo.show', [
            'todo' => $todo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $todo = ToDo::where('slug', $slug)->first();

        return view('todo.edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:800',
            'detail' => 'required',
        ]);

        $todo = ToDo::where('slug', $slug)
            ->update([
                'slug' => SlugService::createSlug(ToDo::class, 'slug', $request->title),
                'title' => $request->title,
                'detail' => $request->detail,
                'completed' => 0
            ]);

        return redirect('/todolist')->with('status', 'Your todo updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $todo = ToDo::where('slug', $slug)
            ->delete();
        
        return redirect('/todolist')->with('status', 'Your todo deleted successfully!!');
    }

    public function complete($slug, $check) {
        if (!$check) {
            $todo = ToDo::where('slug', $slug)
                ->update([
                    'completed' => 1
                ]);
        }
        else {
            $todo = ToDo::where('slug', $slug)
                ->update([
                    'completed' => 0
                ]);
        }
        
        return redirect('/todolist')->with('status', 'Completed status has changed!!');
    }

    public function search(Request $request) {
        if (isset($request->search))
            $todos = Todo::where('title', 'like', '%'.$request->search.'%')->get();
        else
            $todos=null;        

        $_SESSION['search']=$request->search;

        return view('todo.search', [
            'todos' => $todos
        ]);
    }
}
