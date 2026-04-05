<?php
namespace App\Services\IService;

interface IMembersessionService{
    public function GetNotcompletedSessions();
    public function GetMembersOfUpcomingSession($session_id);
    public function GetMembersOfOngoingSession($session_id);

    public function IsAttended($session_id , $member_id);
    public function GetAllMembers();
    public function CreateMemberSession($request);
    public function DeleteMemberSession($session_id , $member_id);

}





?>
