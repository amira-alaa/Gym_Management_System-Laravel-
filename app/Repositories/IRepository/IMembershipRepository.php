<?php
namespace App\Repositories\IRepository;

interface IMembershipRepository
{
    // Define the methods that the MembershipRepository should implement
    public function GetAll();
    public function Create($data);
    public function Delete(int $id);
    public function GetActiveMembers();
}


?>
