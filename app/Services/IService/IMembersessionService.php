<?php
namespace App\Services\IService;

interface IMembersessionService{
    public function GetNotcompletedSessions();
    public function GetMembersOfUpcomingSession($session_id);
    public function GetMembersOfOngoingSession($session_id);

    public function IsAttended($session_id , $member_id);

}





?>
