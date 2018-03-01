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
use Illuminate\Http\Request;
use MetaTag;

class ChannelRepository
{
    const PAGINATION_COUNT = 30;

    public function sortIndex($sort = '')
    {
        switch ($sort){
            case 'date' : $sort = 'created_at'; $sortValue = 'DESC'; break;
            case 'date_asc' : $sort = 'created_at'; $sortValue = 'ASC'; break;
            case 'subscribers' : $sort = 'subscribers'; $sortValue = 'DESC'; break;
            case 'subscribers_asc' : $sort = 'subscribers'; $sortValue = 'ASC'; break;
            default : $sort = 'id'; $sortValue = 'DESC'; break;
        }

        $channels = Channel::where('status', '1')
            ->with('category')
            ->orderBy($sort, $sortValue)
            ->paginate(self::PAGINATION_COUNT);

        return $channels;
    }

    public function initIndex($sort)
    {
        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'subscribers' || $sort === 'subscribers_asc')
        {

            $channels = self::sortIndex($sort);

            $randomChannel = Channel::inRandomOrder()->first();
            $categoryNews = CategoryNews::all()->toArray();
            $category = Category::all()->toArray();
            $lastNews = self::lastNews();
            $channelsPopul = self::channelPopul();

            $data = [
                'randomChannel' => $randomChannel,
                'categoryNews' => $categoryNews,
                'category' => $category,
                'channelsPopul' => $channelsPopul,
                'channels' => $channels,
                'lastNews' => $lastNews,
            ];

            return $data;
        } else {
            abort('404');
        }
    }

    public function sortCategory($id, $sort = '')
    {
        switch ($sort){
            case 'date' : $sort = 'created_at'; $sortValue = 'DESC'; break;
            case 'date_asc' : $sort = 'created_at'; $sortValue = 'ASC'; break;
            case 'subscribers' : $sort = 'subscribers'; $sortValue = 'DESC'; break;
            case 'subscribers_asc' : $sort = 'subscribers'; $sortValue = 'ASC'; break;
            default : $sort = 'id'; $sortValue = 'DESC'; break;
        }

        $channels = Channel::where('status', '1')
            ->where('category_id', $id)
            ->orderBy($sort, $sortValue)
            ->paginate(self::PAGINATION_COUNT);

        return $channels;
    }

    public function initCategory($id, $sort)
    {
        $categoryOne = Category::findOrFail($id);

        MetaTag::set('title', 'Каталог телеграмм каналов | ' . $categoryOne['name']);
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        if($sort === '' || $sort === 'date' || $sort === 'date_asc' || $sort === 'subscribers' || $sort === 'subscribers_asc'){

            $channels = self::sortCategory($id, $sort);
            $randomChannel = Channel::inRandomOrder()->first();
            $category = Category::all()->toArray();
            $lastNews = self::lastNews();
            $channelsPopul = self::channelPopul();

            $data = [
                'randomChannel' => $randomChannel,
                'lastNews' => $lastNews,
                'categoryOne' => $categoryOne,
                'category' => $category,
                'channelsPopul' => $channelsPopul,
                'channels' => $channels,
            ];

            return $data;
        } else{
            abort('404');
        }
    }

    public function initSearch(Request $request)
    {
        MetaTag::set('title', 'Каталог популярных телеграмм каналов');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');

        $randomChannel = Channel::inRandomOrder()->first();
        $lastNews = self::lastNews();
        $category = Category::all()->toArray();
        $q = trim(strip_tags($request->get('q')));
        $channelsSearch = self::channelSearch($request);

        $data = [
            'randomChannel' => $randomChannel,
            'category' => $category,
            'lastNews' => $lastNews,
            'channelsSearch' => $channelsSearch,
            'q' => $q,
        ];

        return $data;
    }

    public function lastNews()
    {
        $lastNews = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return $lastNews;
    }

    public function channelPopul()
    {
        $channelsPopul = Channel::where('status', '1')
            ->where('popul', '1')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return $channelsPopul;
    }

    public function channelSearch(Request $request)
    {
        $q = trim(strip_tags($request->get('q')));

        $channelsSearch = Channel::where('name','LIKE',"%{$q}%")
            ->orWhere('description','LIKE',"%{$q}%")
            ->where('status', '1')
            ->with('category')
            ->orderBy('id', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        $channelsSearch->appends(['q' => $q]);

        return $channelsSearch;
    }

}