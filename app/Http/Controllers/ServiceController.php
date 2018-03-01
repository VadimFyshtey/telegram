<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{

    protected $repositoryInit;

    public function __construct(ServiceRepository $repositoryInit)
    {
        $this->repositoryInit = $repositoryInit;
    }

    public function index()
    {
        $data = $this->repositoryInit->initService();
        return view('service.index', compact('data'));
    }

}
