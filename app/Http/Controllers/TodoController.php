<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('todos', [
            //
        ]);
    }
}
