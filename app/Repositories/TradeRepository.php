<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 04.02.2018
 * Time: 15:52
 */

namespace App\Repositories;

use App\Category;
use App\Trade;
use MetaTag;
use Illuminate\Support\Facades\Input;

class TradeRepository
{

    const PAGINATION_COUNT = 30;

    public function sort()
    {
        $trades = Trade::where('status', '1')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(self::PAGINATION_COUNT);

        if(isset($_REQUEST['category'])){
            $category_url = $_REQUEST['category'];
            $category_url = (int)$category_url;
            $trades = Trade::where('status', '1')
                ->where('category_id', $category_url)
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->paginate(self::PAGINATION_COUNT);
        }
        if(!empty($_GET['filter_category'])){
            $filter_category = $_GET['filter_category'];
            $trades = Trade::where('status', '1')
                ->where('category_id', $filter_category)
                ->with('category')
                ->orderBy('created_at', 'desc')
                ->paginate(self::PAGINATION_COUNT);
        }
        if(isset($_REQUEST['sort'])){
            $sort_url = $_REQUEST['sort'];
            $arr_sort = explode("_", $sort_url);
            $arr_sort_name = $arr_sort[0];
            $arr_sort_val = $arr_sort[1];
            if($arr_sort_name === 'created'){
                $arr_sort_name = 'created_at';
            }
            $trades = Trade::where('status', '1')
                ->with('category')
                ->orderBy($arr_sort_name, $arr_sort_val)
                ->paginate(self::PAGINATION_COUNT);
        }
        if(!empty($_GET['sort_name']) && !empty($_GET['sort_val'])){
            $sort_name = $_GET['sort_name'];
            $sort_val = $_GET['sort_val'];
            $trades = Trade::where('status', '1')
                ->with('category')
                ->orderBy($sort_name, $sort_val)
                ->paginate(self::PAGINATION_COUNT);
        }
        if(!empty($_GET['sort_name']) && !empty($_GET['sort_val']) && !empty($_GET['filter_is_category_val'])){
            $sort_name = $_GET['sort_name'];
            $sort_val = $_GET['sort_val'];
            $filter_category = $_GET['filter_is_category_val'];
            $trades = Trade::where('status', '1')
                ->where('category_id', $filter_category)
                ->with('category')
                ->orderBy($sort_name, $sort_val)
                ->paginate(self::PAGINATION_COUNT);
        }

        if(isset($_REQUEST['category']) && isset($_REQUEST['sort'])){

            $category_url = $_REQUEST['category'];
            $category_url = (int)$category_url;

            $sort_url = $_REQUEST['sort'];

            $arr_sort = explode("_", $sort_url);
            $arr_sort_name = $arr_sort[0];
            $arr_sort_val = $arr_sort[1];

            if($arr_sort_name === 'created'){
                $arr_sort_name = 'created_at';
            }
            $trades = Trade::where('status', '1')
                ->where('category_id', $category_url)
                ->with('category')
                ->orderBy($arr_sort_name, $arr_sort_val)
                ->paginate(self::PAGINATION_COUNT);
        }

        return $trades;
    }

    public function initTrade()
    {
        MetaTag::set('title', 'Биржа телеграмм каналов.');
        MetaTag::set('description', 'На этом сайте вы можете заработать на своем телеграмм канале. Все каналы удобно рассортированы по категориям – найдите себе канал для рекламы или добавьте свой.');

        $category = Category::all()->toArray();
        $trades_top = self::tradeTop();
        $trades = self::sort();

        $data = [
            'trades_top' => $trades_top,
            'trades' => $trades->appends(Input::except('page')),
            'category' => $category,
        ];

        return $data;

    }

    public function tradeTop()
    {
        $trades_top = Trade::where('status', '1')
            ->where('top', '1')
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return $trades_top;
    }

    public function initView($id)
    {
        $trade = Trade::findOrFail($id);
        MetaTag::set('title', 'Биржа телеграмм каналов | ' . $trade['name']);
        MetaTag::set('description', 'На этом сайте вы можете заработать на своем телеграмм канале. Все каналы удобно рассортированы по категориям – найдите себе канал для рекламы или добавьте свой.');

        $category = Category::all()->toArray();
        $trades_top = self::tradeTop();

        $data = [
            'trades_top' => $trades_top,
            'trade' => $trade,
            'category' => $category,
        ];

        return $data;
    }
}