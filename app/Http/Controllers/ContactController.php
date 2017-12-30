<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ContactController extends Controller
{
    public function index(){
        $category = Category::all()->toArray();

        return view('contact.index', compact('category'));
    }
}
