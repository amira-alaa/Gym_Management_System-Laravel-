<?php

namespace App\Repositories\Repository;

use App\Models\Membersession;
use App\Models\Session;
use App\Repositories\IRepository\IMembersessionRepository;

class MembersessionRepository implements IMembersessionRepository{

    public function GetNotcompletedSessions(){
        return Session::with('category' , 'trainer')->where('end_time', '>' , now())->get();
    }
    public function GetMOfUpcomingSession($session_id){
        return MemberSession::with(['member'])->where('session_id', $session_id)->get();
    }
    public function GetMOfOngoingSession($session_id){
        return MemberSession::with(['member'])->where('session_id', $session_id)->get();
    }

    public function GetMSByIds($session_id , $member_id){
        return Membersession::where('session_id',$session_id)->where('member_id' , $member_id)->firstOrFail();
    }
    public function Create($data){
        return Membersession::create($data);
    }
    public function Delete($session_id , $member_id){
        return Membersession::where('session_id',$session_id)->where('member_id' , $member_id)->delete();
    }


}
