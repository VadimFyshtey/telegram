<?php

namespace App\Http\Controllers;

use App\News;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;

use App\Category;
use App\Channel;
use MetaTag;

class ChannelController extends Controller
{

    protected $repositoryInit;

    public function __construct(ChannelRepository $repositoryInit)
    {
        $this->repositoryInit = $repositoryInit;
    }

    public function index($sort = '')
    {
        $data = $this->repositoryInit->initIndex($sort);
        return view('channel.index', compact('data'));
    }

    public function category($id, $sort = '')
    {
        $data = $this->repositoryInit->initCategory($id, $sort);
        return view('channel.category', compact('data'));
    }

    public function search(Request $request)
    {
        $data = $this->repositoryInit->initSearch($request);
        return view('channel.search', compact('data'));
    }

}
