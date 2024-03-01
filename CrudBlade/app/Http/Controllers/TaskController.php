<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): View
    {
        dd(session('user_id'));
        return view('task.index');
    }

    // public function store(Request $request){
    //     dd($request->all());
    // }
}
