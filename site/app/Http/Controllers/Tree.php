<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Tree;

class Main extends Controller
{
    public function index()
    {
    	$data = Tree::all();

        return 1;
    }
}
