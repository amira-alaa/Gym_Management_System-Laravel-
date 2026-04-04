<?php
namespace App\Services\Service;

use App\Repositories\IRepository\IMemberRepository;
use App\Repositories\IRepository\IMembershipRepository;
use App\Repositories\IRepository\IPlanRepository;
use App\Services\IService\IMembershipService;

class MembershipService implements IMembershipService
{
    private IMembershipRepository $_membershipRepository;
    private IMemberRepository $_memberRepository;
    private IPlanRepository $_planRepository;

    public function __construct(IMembershipRepository $membershipRepository, IMemberRepository $memberRepository,IPlanRepository $planRepository)
    {
        $this->_membershipRepository = $membershipRepository;
        $this->_memberRepository = $memberRepository;
        $this->_planRepository = $planRepository;
    }
    // Implement the methods defined in the IMembershipService interface
    public function getAllMemberships()
    {
        // Logic to retrieve all memberships
        $memberships = $this->_membershipRepository->GetAll();
        if($memberships == null)
            return null;
        return $memberships;
    }

    public function createMembership($request)
    {
        // Logic to create a new membership
        $data = $request->except('_token');
        $data['start_date'] = now();
        $data['end_date'] = now()->addDays(7);
        // return $data;
        try{

            $this->_membershipRepository->Create($data);
            return true;
        }catch(\Exception $e){
            return false;
        }

    }

    public function GetAllMembers()
    {
        // Logic to retrieve all members
        return $this->_memberRepository->GetAll();
    }

    public function GetAllPlans()
    {
        // Logic to retrieve all plans
        return $this->_planRepository->GetAll();
    }



    public function DeleteMembership($id)
    {
        // Logic to delete a membership
        try{
            $this->_membershipRepository->Delete($id);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}




?>
