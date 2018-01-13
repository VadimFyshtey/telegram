<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Channel;
use App\News;
use App\Service;
use MetaTag;

class ServiceController extends Controller
{

    public function index(){

        $service = Service::find(1);

        MetaTag::set('title', $service['title']);
        MetaTag::set('description', $service['description']);

        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $random_channel = Channel::inRandomOrder()->first();

        $category = Category::all()->toArray();

        return view('service.index', compact('category', 'random_channel', 'last_news', 'service'));
    }

}
