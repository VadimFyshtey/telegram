<?php

namespace App\Http\Controllers;

use App\Repositories\TradeRepository;
use App\Trade;
use App\Category;

use MetaTag;

class TradeController extends Controller
{

    protected $repositoryInit;

    public function __construct(TradeRepository $repositoryInit)
    {
        $this->repositoryInit = $repositoryInit;
    }

    public function index()
    {
        $data = $this->repositoryInit->initTrade();
        return view('trade.index', compact('data'));
    }

    public function view($id)
    {
        $data = $this->repositoryInit->initView($id);
        return view('trade.view', compact('data'));
    }

}
