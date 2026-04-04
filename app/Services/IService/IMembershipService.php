<?php
namespace App\Services\IService;

interface IMembershipService
{
    // Define the methods that the MembershipService should implement
    public function getAllMemberships();
    public function createMembership($request);
    public function DeleteMembership($id);
    public function GetAllMembers();
    public function GetAllPlans();
}


?>
