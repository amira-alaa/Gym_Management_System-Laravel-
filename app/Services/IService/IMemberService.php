<?php
namespace App\Services\IService;
use Illuminate\Http\Request;


interface IMemberService{
    public function GetAllMembers();
    public function GetMemberById(int $id);
    public function GetHealthRecord(int $id);
    public function CreateMember(Request $request);
    
    public function UpdateMember(Request $request , $id);
    public function DeleteMember(int $id);
}
?>
