<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
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
        // get all plans
        $plans = $this->_iPlanService->GetAllPlans();
        return view('Plan.index' , compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


    public function show(Plan $plan)
    {
        // get plan details by id
        $plan = $this->_iPlanService->GetPlanById($plan->id);
        return view('Plan.planDetails' , compact('plan'));
    }


    public function edit($id)
    {
        // go to edit view
        $plan = $this->_iPlanService->GetPlanById($id);
        return view('Plan.edit' , compact('plan'));
    }


    public function update(UpdatePlanRequest $request, $id)
    {
        //
        $flag = $this->_iPlanService->UpdatePlan($id, $request);
        // return $flag;
        if ($flag)
            return redirect()->route('plans.index')->with('Success', 'Plan updated successfully.');
        else
            return redirect()->route('plans.index')->with('Error', 'Failed to update the plan. Please try again.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
    public function UpdatePlanStatus($id){
        $flag = $this->_iPlanService->UpdatePlanStatus($id);
        if ($flag)
            return redirect()->route('plans.index')->with('Success', 'Plan status updated successfully.');
        else
            return redirect()->route('plans.index')->with('Error', 'Failed to update the plan status. Please try again.');
    }
}
