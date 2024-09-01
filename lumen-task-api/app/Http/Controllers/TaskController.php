<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //show all tasks
    public function index(){
        dd("Hello World");
        // return response()->json(Tasks::all());
    }

}