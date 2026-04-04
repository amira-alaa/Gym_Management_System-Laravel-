<?php
namespace App\Services\Service;

use App\Services\IService\IPlanService;
use App\Repositories\IRepository\IPlanRepository;

class PlanService implements IPlanService{

	private IPlanRepository $_planRepository;

	public function __construct(IPlanRepository $planRepository)
    {
        $this->_planRepository = $planRepository;

    }
    public function GetAllPlans() {
        // TODO: Implement GetPlans logic here
        $plans = $this->_planRepository->GetAll();
        if($plans != null && count($plans) > 0)
            return $plans;
        else
            return null;

    }

    public function GetPlanById($id) {
        // TODO: Implement GetPlanById logic here
        $plan = $this->_planRepository->GetById($id);
        if($plan != null)
            return $plan;
        else
            return null;
    }

    public function UpdatePlan($id, $request) {
        // TODO: Implement UpdatePlan logic here
        $data = $request->except(['_token', '_method']);
        // return $id;
        try{
            $this->_planRepository->Update($id, $data);
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function UpdatePlanStatus($id)
    {

        // TODO: Implement UpdateIsActive logic here
        $plan = $this->_planRepository->GetByID($id);
        try{
            $plan->is_active = !$plan->is_active;
            $plan->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

}





?>
