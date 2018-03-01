<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Channel;
use App\News;
use MetaTag;

class HomeController extends Controller
{
    public function index(){

        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        $last_news = News::where('status', '1')
            ->where('category_news_id', '1')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $random_channel = Channel::inRandomOrder()->first();

        $category = Category::all()->toArray();

        return view('home.index', compact('category', 'random_channel', 'last_news'));
    }

    public function by(){

        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $random_channel = Channel::inRandomOrder()->first();

        $category = Category::all()->toArray();

        $channels_popul = Channel::where('status', '1')
            ->where('popul', '1')
            ->with('category')
            ->orderBy('id', 'asc')
            ->get();

        return view('home.by88', compact('last_news', 'random_channel', 'category', 'channels_popul'));

    }
}
