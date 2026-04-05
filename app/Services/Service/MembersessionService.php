<?php
namespace App\Services\Service;

use App\Http\Resources\MemberSession\GetMemberSessionResource;
use App\Http\Resources\MemberSession\GetMembersForOngoingResource;
use App\Http\Resources\MemberSession\GetMembersForUpcomingResource;
use App\Repositories\IRepository\IMembersessionRepository;
use App\Services\IService\IMembersessionService;

class MembersessionService implements IMembersessionService{

    private IMembersessionRepository $_membersessionRepo;
    public function __construct(IMembersessionRepository $membersessionRepo)
    {
        $this->_membersessionRepo = $membersessionRepo;
    }
    public function GetNotcompletedSessions(){
        $sessions = $this->_membersessionRepo->GetNotcompletedSessions();
        if($sessions == null)
            return null;
        $sessionsVM = GetMemberSessionResource::collection($sessions)->resolve();
        return $sessionsVM;
    }

    public function GetMembersOfUpcomingSession($session_id){
        $members = $this->_membersessionRepo->GetMOfUpcomingSession($session_id);
        if($members == null)
            return null;
        return GetMembersForUpcomingResource::collection($members)->resolve();
    }

    public function GetMembersOfOngoingSession($session_id){
        $members = $this->_membersessionRepo->GetMOfOngoingSession($session_id);
        if($members == null)
            return null;
        return GetMembersForOngoingResource::collection($members)->resolve();
    }

    public function IsAttended($session_id , $member_id){
        $ms = $this->_membersessionRepo->GetMSByIds($session_id , $member_id);
        
        try{

            $ms->is_attended = !$ms->is_attended;
            $ms->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }

    }


}





?>
