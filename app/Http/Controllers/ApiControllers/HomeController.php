<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\IService\IHomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private IHomeService $_homeService;
    public function __construct(IHomeService $homeService)
    {
        $this->_homeService = $homeService;
    }
    public function index()
    {
        //
        $data = $this->_homeService->index();
        if($data == null) return response()->json([
                                'success' => false]);
        return response()->json([
                            'data' => $data,
                            'success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
