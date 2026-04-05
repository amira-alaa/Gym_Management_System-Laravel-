<?php

namespace App\Repositories\IRepository;

interface IMembersessionRepository{

    public function GetMSByIds($session_id , $member_id);
    public function GetNotcompletedSessions();
    public function GetMOfUpcomingSession($session_id);
    public function GetMOfOngoingSession($session_id);
    public function Create($data);
    public function Delete($session_id , $member_id);

}











?>
