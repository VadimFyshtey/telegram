<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $repositoryInit;

    public function __construct(NewsRepository $repositorySort)
    {
        $this->repositoryInit = $repositorySort;
    }

    public function index($sort = '')
    {
        $data = $this->repositoryInit->initIndex($sort);
        return view('news.index', compact('data'));
    }

    public function category($id, $sort = '')
    {
        $data = $this->repositoryInit->initCategory($id, $sort);
        return view('news.category', compact('data'));
    }

    public function view($id)
    {
        $data = $this->repositoryInit->initView($id);
        return view('news.view', compact('data'));
    }
}
