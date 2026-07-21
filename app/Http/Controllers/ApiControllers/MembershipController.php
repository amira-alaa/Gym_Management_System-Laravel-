<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\IService\IMembershipService;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    private IMembershipService $_membershipService;
    public function __construct(IMembershipService $membershipService)
    {
        $this->_membershipService = $membershipService;

    }

    public function index()
    {
        //
        $memberships = $this->_membershipService->getAllMemberships();
        // return $memberships;
        if($memberships == null || count($memberships) == 0) return response()->json([
                                                'message' => 'No MemberShips Available',
                                                'success' => false
                                            ]);
        return response()->json([
                                    'data' => $memberships,
                                    'success' => true
                                ]);
    }


    public function store(Request $request)
    {
        //
        $flag = $this->_membershipService->createMembership($request);

        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Store MemberShip',
                                        'success' => false
                                    ]);
            return response()->json([
                                    'message' => 'MemberShip is Stored Successfully',
                                    'success' => true
                                ]);
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


    public function destroy($id)
    {
        //
        $flag = $this->_membershipService->deleteMembership($id);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Delete MemberShip',
                                        'success' => false
                                    ]);
        return response()->json([
                                    'message' => 'MemberShip is Deleted Successfully',
                                    'success' => true
                                ]);

    }
}
