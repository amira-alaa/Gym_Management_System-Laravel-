<?php
namespace App\Repositories\Repository;
use App\Repositories\IRepository\IMemberRepository;
use App\Models\Member;
use Illuminate\Http\Request;


class MemberRepository implements IMemberRepository
{
    // This class will contain all the database operations related to the Member model.
    // For example, you can have methods like getAllMembers(), getMemberById($id), createMember($data), etc.

    public function GetAll()
    {
        return Member::all();
    }

    public function GetById(int $id)
    {
        return Member::find( $id);
    }

    public function GetHealthRecord(int $id)
    {
        return Member::find($id)->health_record;
    }

    public function Create($data)
    {
        Member::create($data);
    }

    public function Update(int $id, $data)
    {
        return Member::find($id)->update($data);
    }

    public function Delete(int $id)
    {
        return Member::find($id)->delete();
    }
}

?>
