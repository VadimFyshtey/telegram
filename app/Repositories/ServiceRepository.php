<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 04.02.2018
 * Time: 15:52
 */

namespace App\Repositories;

use App\Service;
use App\News;
use App\Channel;
use App\Category;
use MetaTag;

class ServiceRepository
{

    public function initService()
    {
        $service = self::forService();
        $lastNews = self::forLastNews();
        $randomChannel = self::forRandomChannel();
        $category = self::forCategory();

        $data = [
          'service' => $service,
          'lastNews' => $lastNews,
          'randomChannel' => $randomChannel,
          'category' => $category,
        ];

        return $data;
    }

    public function forService()
    {
        $service = Service::find(1);

        MetaTag::set('title', $service['title']);
        MetaTag::set('description', $service['description']);

        return $service;
    }

    public function forLastNews()
    {
        $lastNews = News::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return $lastNews;
    }

    public function forRandomChannel()
    {
        return $randomChannel = Channel::inRandomOrder()->first();
    }

    public function forCategory(){
        return $category = Category::all()->toArray();
    }
}