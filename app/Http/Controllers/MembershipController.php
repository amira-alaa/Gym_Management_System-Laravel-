<?php

namespace App\Http\Controllers;

use App\Services\IService\IMembershipService;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    private IMembershipService $_membershipService;
    public function __construct(IMembershipService $membershipService)
    {
        $this->_membershipService = $membershipService;

    }
    //
    public function index(){
        $memberships = $this->_membershipService->getAllMemberships();
        return view('MemberShip.index' , compact('memberships'));
    }

    public function create(){
        $members = $this->_membershipService->GetAllMembers();
        $plans = $this->_membershipService->GetAllPlans();
        return view('MemberShip.create' , compact('members' , 'plans'));
    }

    public function store(Request $request){
        $flag = $this->_membershipService->createMembership($request);

        if($flag)
            return redirect()->route('memberships')->with('Success', 'Membership created successfully');
        else
            return redirect()->route('memberships')->with('Error', 'Failed to create membership');
    }
    public function destroy($id){

        $flag = $this->_membershipService->deleteMembership($id);
        if($flag)
            return redirect()->route('memberships')->with('Success', 'Membership deleted successfully');
        else
            return redirect()->route('memberships')->with('Error', 'Failed to delete membership');

    }
}
