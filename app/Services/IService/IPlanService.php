<?php
namespace App\Services\IService;

interface IPlanService{

    public function GetAllPlans();
    public function GetPlanById($id);
    public function UpdatePlan($id, $request);
    public function UpdatePlanStatus($id);

}




?>
