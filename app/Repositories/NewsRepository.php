<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 27.02.2018
 * Time: 21:05
 */

namespace App\Repositories;

use App\Category;
use App\CategoryNews;
use App\Channel;
use App\News;
use MetaTag;

class NewsRepository
{
    const PAGINATION_COUNT = 20;

    public function sortIndex($sort = '')
    {
        switch ($sort){
            case 'date' : $sort = 'created_at'; $sortValue = 'DESC'; break;
            case 'date_asc' : $sort = 'created_at'; $sortValue = 'ASC'; break;
            case 'view' : $sort = 'view'; $sortValue = 'DESC'; break;
            case 'view_asc' : $sort = 'view'; $sortValue = 'ASC'; break;
            default : $sort = 'id'; $sortValue = 'DESC'; break;
        }
        $news = News::where('status', '1')->orderBy($sort, $sortValue)->paginate(self::PAGINATION_COUNT);
        return $news;
    }

    public function initIndex($sort)
    {

        MetaTag::set('title', 'Новости телеграмм и всего интернета.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'view' || $sort === 'view_asc') {

        $news = self::sortIndex($sort);

        $random_channel = Channel::inRandomOrder()->first();
        $categoryNews = CategoryNews::all()->toArray();
        $category = Category::all()->toArray();

        $data = [
            'random_channel' => $random_channel,
            'categoryNews' => $categoryNews,
            'category' => $category,
            'news' => $news,
        ];
        return $data;

        } else{
            abort('404');
        }
    }

    public function sortCategory($id, $sort = '')
    {
        switch ($sort){
            case 'date' : $sort = 'created_at'; $sortValue = 'DESC'; break;
            case 'date_asc' : $sort = 'created_at'; $sortValue = 'ASC'; break;
            case 'view' : $sort = 'view'; $sortValue = 'DESC'; break;
            case 'view_asc' : $sort = 'view'; $sortValue = 'ASC'; break;
            default : $sort = 'id'; $sortValue = 'DESC'; break;
        }
        $news = News::where('status', '1')
            ->where('category_news_id', $id)
            ->orderBy($sort, $sortValue)
            ->paginate(self::PAGINATION_COUNT);

        return $news;
    }

    public function initCategory($id, $sort)
    {
        $categoryOne = CategoryNews::findOrFail($id);

        MetaTag::set('title', 'Новости ' . $categoryOne['name']);
        MetaTag::set('description', $categoryOne['description']);

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'view' || $sort === 'view_asc') {

            $news = self::sortCategory($id, $sort);
            $random_channel = Channel::inRandomOrder()->first();
            $categoryNews = CategoryNews::all()->toArray();
            $category = Category::all()->toArray();

            $data = [
                'random_channel' => $random_channel,
                'categoryNews' => $categoryNews,
                'categoryOne' => $categoryOne,
                'category' => $category,
                'news' => $news,
            ];

            return $data;
        } else{
            abort('404');
        }
    }

    public function initView($id)
    {
        $news = News::findOrFail($id);

        MetaTag::set('title', $news['title']);
        MetaTag::set('description', $news['description']);

        $random_channel = Channel::inRandomOrder()->first();
        $categoryNews = CategoryNews::all()->toArray();
        $category = Category::all()->toArray();
        $news->viewedCounter();

        $data = [
            'random_channel' => $random_channel,
            'categoryNews' => $categoryNews,
            'category' => $category,
            'news' => $news,
        ];

        return $data;
    }
}