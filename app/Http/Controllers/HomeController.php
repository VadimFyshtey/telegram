<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Channel;

class HomeController extends Controller
{

    const PAGINATION_COUNT = 30;

    public function index($sort = '')
    {

        $random_channel = Channel::inRandomOrder()->first();


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

            if($sort === 'date'){
                $channels = Channel::where('status', '1')
                    ->with('category')
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGINATION_COUNT);
            }

            if($sort === 'date_asc'){
                $channels = Channel::where('status', '1')
                    ->with('category')
                    ->orderBy('created_at', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }

            if($sort === 'subscribers'){
                $channels = Channel::where('status', '1')
                    ->with('category')
                    ->orderBy('subscribers', 'desc')
                    ->paginate(self::PAGINATION_COUNT);
            }

            if($sort === 'subscribers_asc'){
                $channels = Channel::where('status', '1')
                    ->with('category')
                    ->orderBy('subscribers', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }


        return view('home.index', compact('category', 'channels_popul' ,'channels', 'random_channel'));
    }

    public function category($id, $sort = ''){

        $random_channel = Channel::inRandomOrder()->where('category_id', $id)->first();

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

        if($sort === 'date'){
            $channels = Channel::where('status', '1')
                ->where('category_id', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(self::PAGINATION_COUNT);
        }

        if($sort === 'date_asc'){
            $channels = Channel::where('status', '1')
                ->where('category_id', $id)
                ->orderBy('created_at', 'asc')
                ->paginate(self::PAGINATION_COUNT);
        }

        if($sort === 'subscribers'){
            $channels = Channel::where('status', '1')
                ->where('category_id', $id)
                ->orderBy('subscribers', 'desc')
                ->paginate(self::PAGINATION_COUNT);
        }

        if($sort === 'subscribers_asc'){
            $channels = Channel::where('status', '1')
                ->where('category_id', $id)
                ->orderBy('subscribers', 'asc')
                ->paginate(self::PAGINATION_COUNT);
        }

        return view('home.category', compact('category', 'category_one' ,'channels', 'channels_popul', 'random_channel'));
    }

    public function search(Request $request){

        $random_channel = Channel::inRandomOrder()->first();

        $q = trim(strip_tags($request->get('q')));

        $category = Category::all()->toArray();

        $channels_search = Channel::where('status', '1')
            ->where('name','LIKE',"%{$q}%")
            ->orWhere('description','LIKE',"%{$q}%")
            ->with('category')
            ->orderBy('id', 'desc')
            ->get();

        return view('home.search', compact('channels_search', 'category', 'q', 'random_channel'));
    }

}
