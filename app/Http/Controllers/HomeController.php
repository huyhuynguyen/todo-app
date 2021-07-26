<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class HomeController extends Controller
{
    public function index() {
        $todo = Todo::orderBy('updated_at', 'DESC')->first();

        return view('home', [
            'todo' => $todo
        ]);
    }
}
