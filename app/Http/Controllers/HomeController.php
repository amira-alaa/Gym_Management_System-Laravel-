<?php

namespace App\Http\Controllers;

use App\Services\IService\IHomeService;
use App\Services\Service\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private IHomeService $_homeService;
    public function __construct(IHomeService $homeService)
    {
        $this->_homeService = $homeService;
    }
    //

    public function index(){
        $data = $this->_homeService->index();
        return view('index' , compact('data'));
    }

}
