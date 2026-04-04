<?php
namespace App\Services\Service;

use App\Http\Resources\GetHomeResource;
use App\Repositories\IRepository\IMemberRepository;
use App\Repositories\IRepository\IMembershipRepository;
use App\Repositories\IRepository\ISessionRepository;
use App\Repositories\IRepository\ITrainerRepository;
use App\Services\IService\IHomeService;

class HomeService implements IHomeService{
    private IMemberRepository $_memberRepo;
    private ITrainerRepository $_trainerRepo;
    private ISessionRepository $_sessionRepo;
    private IMembershipRepository $_membershipRepo;
    public function __construct(IMemberRepository $memberRepo , ITrainerRepository $trainerRepo ,
                                IMembershipRepository $membershipRepo , ISessionRepository $sessionRepo){
        $this->_memberRepo = $memberRepo;
        $this->_trainerRepo = $trainerRepo;
        $this->_sessionRepo = $sessionRepo;
        $this->_membershipRepo = $membershipRepo;

    }
    public function index(){
        $data =[
            'total_members' => $this->_memberRepo->GetAll()->count(),
            'active_members' => $this->_membershipRepo->GetActiveMembers()->count(),
            'trainers' => $this->_trainerRepo->GetAll()->count(),
            'upComing_sessions' => $this->_sessionRepo->GetUpComingSessions()->count(),
            'onGoing_sessions' => $this->_sessionRepo->GetOnGoingSessions()->count(),
            'completed_sessions' => $this->_sessionRepo->GetCompletedSessions()->count()
        ];
        $dataVM = new GetHomeResource($data);
        return $dataVM->resolve();

    }
}