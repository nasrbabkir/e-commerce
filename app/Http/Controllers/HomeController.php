<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Chef;

class HomeController extends Controller
{



    public function index()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        return view('homepage', compact('foods','chefs'));
    }//end of index

}
