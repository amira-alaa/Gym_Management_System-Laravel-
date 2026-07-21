<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\IService\IPlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private IPlanService $_iPlanService;

    public function __construct(IPlanService $iPlanService)
    {
        $this->_iPlanService = $iPlanService;
    }

    public function index()
    {
        //
        $plans = $this->_iPlanService->GetAllPlans();
        if(!$plans) return response()->json([
                                                'message' => 'No Plans Available',
                                                'success' => false
                                            ]);
        return response()->json([
                                    'data' => $plans,
                                    'success' => true
                                ]);
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


    public function show($id)
    {
        //
        $plan = $this->_iPlanService->GetPlanById($id);
        if($plan == null) return response()->json([
                                                'message' => 'Plan is Not Found',
                                                'success' => false
                                            ]);
        return response()->json([
                                    'data' => $plan,
                                    'success' => true
                                ]);
    }


    public function update(Request $request, $id)
    {
        //
        $flag = $this->_iPlanService->UpdatePlan($id, $request);
        // return $flag;
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Update Plan',
                                        'success' => false
                                    ]);
            return response()->json([
                                    'message' => 'Plan is Updated Successfully',
                                    'success' => true
                                ]);
    }

    public function UpdatePlanStatus($id){
        $flag = $this->_iPlanService->UpdatePlanStatus($id);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Active Plan',
                                        'success' => false
                                    ]);
        return response()->json([
                                'message' => 'Plan is activated Successfully',
                                'success' => true
                            ]);
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
