<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class NewsController extends Controller
{
    public function index(){

        $category = Category::all()->toArray();

        return view('news.index', compact('category'));
    }

    public function view($id){

        $category = Category::all()->toArray();

        return view('news.view', compact('category'));
    }
}
