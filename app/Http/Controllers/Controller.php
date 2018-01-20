<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MetaTag;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        MetaTag::set('title', 'Каталог популярных телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте собраны самые популярные каналы в Телеграмм. Все каналы удобно рассортированы по категориям – найдите себе канал или добавьте свой.');
    }

}
