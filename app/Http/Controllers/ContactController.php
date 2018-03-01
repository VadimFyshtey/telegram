<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $repositoryInit;

    public function __construct(ContactRepository $repositoryInit)
    {
        $this->repositoryInit = $repositoryInit;
    }

    public function index(Request $request)
    {
        $data = $this->repositoryInit->initContact($request);
        return view('contact.index', compact('data'));
    }
}
