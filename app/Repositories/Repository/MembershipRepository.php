<?php
namespace App\Repositories\Repository;

use App\Models\Membership;
use App\Repositories\IRepository\IMembershipRepository;

class MembershipRepository implements IMembershipRepository
{
    // Implement the methods defined in the IMembershipRepository interface
    public function GetAll()
    {
        // Logic to retrieve all Active memberships from the database
        return Membership::with(['member', 'plan'])->where('end_date', '>', now())->get();
    }

    public function Create($data)
    {
        // Logic to create a new membership in the database
        return Membership::create($data);
    }

    public function Delete(int $id)
    {
        // Logic to delete a membership from the database
        return Membership::find($id)->delete();
    }
    public function GetActiveMembers(){
        return Membership::where('end_date' ,'>=' , now())->get();
    }

}




?>
