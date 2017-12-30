<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Channel;

class HomeController extends Controller
{

    const PAGINATION_COUNT = 30;

    public function index()
    {
        $category = Category::all()->toArray();

        $channels_popul = Channel::where('status', '1')
            ->where('popul', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->get();

        $channels = Channel::where('status', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        return view('home.index', compact('category', 'channels_popul' ,'channels'));
    }

    public function category($id){
        $category = Category::all()->toArray();

        $category_one = Category::findOrFail($id);

        $channels_popul = Channel::where('status', '1')
            ->where('category_id', $id)
            ->where('popul', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->get();


        $channels = Channel::where('status', '1')
            ->where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        return view('home.category', compact('category', 'category_one' ,'channels', 'channels_popul'));
    }

    public function search(Request $request){
        $q = trim(strip_tags($request->get('q')));

        $category = Category::all()->toArray();

        $channels_search = Channel::where('status', '1')
            ->where('name','LIKE',"%{$q}%")
            ->orWhere('description','LIKE',"%{$q}%")
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        return view('home.search', compact('channels_search', 'category', 'q'));
    }

}
