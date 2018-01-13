<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Channel;
use App\News;
use App\CategoryNews;
use MetaTag;
class NewsController extends Controller
{

    const PAGINATION_COUNT = 30;


    public function index($sort = ''){

        MetaTag::set('title', 'Новости телеграмм и всего интернета.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'view' || $sort === 'view_asc'){

            $random_channel = Channel::inRandomOrder()->first();

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $categoryNews = CategoryNews::all()->toArray();

            $category = Category::all()->toArray();

            $news = News::where('status', '1')
                ->orderBy('id', 'desc')
                ->paginate(self::PAGINATION_COUNT);

            if($sort === 'date'){
                $news = News::where('status', '1')
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'date_asc'){
                $news = News::where('status', '1')
                    ->orderBy('created_at', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'view'){
                $news = News::where('status', '1')
                    ->orderBy('view', 'desc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'view_asc'){
                $news = News::where('status', '1')
                    ->orderBy('view', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }

            return view('news.index', compact('category', 'categoryNews', 'news','random_channel', 'last_news'));
        }else{
            abort(404);
        }


    }

    public function category($id, $sort = ''){

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'view' || $sort === 'view_asc'){

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $random_channel = Channel::inRandomOrder()->first();

            $category_one = CategoryNews::findOrFail($id);

            $categoryNews = CategoryNews::all()->toArray();

            $category = Category::all()->toArray();

            $news = News::where('status', '1')
                ->where('category_news_id', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(self::PAGINATION_COUNT);

            if($sort === 'date'){
                $news = News::where('status', '1')
                    ->where('category_news_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'date_asc'){
                $news = News::where('status', '1')
                    ->where('category_news_id', $id)
                    ->orderBy('created_at', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'view'){
                $news = News::where('status', '1')
                    ->where('category_news_id', $id)
                    ->orderBy('view', 'dasc')
                    ->paginate(self::PAGINATION_COUNT);
            }
            if($sort === 'view_asc'){
                $news = News::where('status', '1')
                    ->where('category_news_id', $id)
                    ->orderBy('view', 'asc')
                    ->paginate(self::PAGINATION_COUNT);
            }

            MetaTag::set('title', 'Новости ' . $category_one['name']);
            MetaTag::set('description', $category_one['description']);


            return view('news.category', compact('category', 'categoryNews', 'news','random_channel', 'category_one', 'last_news'));

        }else{
            abort(404);
        }


    }

    public function view($id){

        if($id){
            $random_channel = Channel::inRandomOrder()->first();

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $news = News::findOrFail($id);

            $categoryNews = CategoryNews::all()->toArray();

            $category = Category::all()->toArray();

            MetaTag::set('title', $news['title']);
            MetaTag::set('description', $news['description']);

            $news->viewedCounter();

            return view('news.view', compact('category', 'random_channel', 'news', 'categoryNews', 'last_news'));
        }else{
            abort(404);
        }

    }
}
