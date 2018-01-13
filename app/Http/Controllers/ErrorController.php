<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Category;
use App\Channel;
use MetaTag;

class ErrorController extends Controller
{
    public function index()
    {

        $random_channel = Channel::inRandomOrder()->first();

        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $category = Category::all()->toArray();

        $channels_popul = Channel::where('status', '1')
            ->where('popul', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->get();

        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        return view('layouts.404', compact('category', 'channels_popul', 'random_channel', 'last_news'));
    }

}
