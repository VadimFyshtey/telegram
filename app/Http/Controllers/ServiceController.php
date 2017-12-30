<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ServiceController extends Controller
{

    public function index(){
        $category = Category::all()->toArray();

        return view('service.index', compact('category'));
    }

}
