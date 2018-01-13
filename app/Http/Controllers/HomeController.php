<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Category;
use App\Channel;
use MetaTag;
class HomeController extends Controller
{

    const PAGINATION_COUNT = 30;

    public function index($sort = '')
    {

        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');


        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'subscribers' || $sort === 'subscribers_asc'){

            $random_channel = Channel::inRandomOrder()->first();

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $category = Category::all()->toArray();

            $channels_popul = Channel::where('status', '1')
                ->where('popul', '1')
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->get();

            $channels = Channel::where('status', '1')
                ->with('category')
                ->orderBy('created_at', 'desc')
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

            return view('home.index', compact('category', 'channels_popul' ,'channels', 'random_channel', 'last_news'));

        } else{
            abort(404);
        }


    }

    public function category($id, $sort = ''){

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'subscribers' || $sort === 'subscribers_asc'){

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $random_channel = Channel::inRandomOrder()->first();

            $category = Category::all()->toArray();

            $category_one = Category::findOrFail($id);

            $channels_popul = Channel::where('status', '1')
                ->where('category_id', $id)
                ->where('popul', '1')
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->get();


            $channels = Channel::where('status', '1')
                ->where('category_id', $id)
                ->orderBy('created_at', 'desc')
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

            MetaTag::set('title', 'Каталог телеграмм каналов | ' . $category_one['name']);
            MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

            return view('home.category', compact('category', 'category_one' ,'channels', 'channels_popul', 'random_channel', 'last_news'));

        }else{
            abort(404);
        }

    }

    public function search(Request $request){

        MetaTag::set('title', 'Каталог популярных телеграмм каналов');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        $random_channel = Channel::inRandomOrder()->first();

        $last_news = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $q = trim(strip_tags($request->get('q')));

        $category = Category::all()->toArray();

        $channels_search = Channel::where('name','LIKE',"%{$q}%")
            ->orWhere('description','LIKE',"%{$q}%")
            ->where('status', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        $channels_search->appends(['q' => $q]);

        return view('home.search', compact('channels_search', 'category', 'q', 'random_channel', 'last_news'));
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
