<?php
namespace App\Services\Service;

use App\Http\Resources\GetSessionsResource;
use App\Repositories\IRepository\ISessionRepository;
use App\Services\IService\ISessionService;

class SessionService implements ISessionService
{
    private ISessionRepository $_sessionRepository;

    public function __construct(ISessionRepository $sessionRepository )
    {
        $this->_sessionRepository = $sessionRepository;
    }
    public function GetAllSessions()
    {
        $sessions = $this->_sessionRepository->GetAll();
        if ($sessions == null || Count($sessions) == 0)
            return null;
        $sessionsVM = GetSessionsResource::collection($sessions)->resolve();
        return $sessionsVM;

    }
    public function GetSessionById($id){
        $session = $this->_sessionRepository->GetById($id);
        if ($session == null)
            return null;
        $sessionVM = new GetSessionsResource($session);
        return $sessionVM->resolve();
    }
    public function GetAllTrainers()
    {
        return $this->_sessionRepository->GetAllTrainers();
    }
    public function GetAllCategories()
    {
        return $this->_sessionRepository->GetAllCategories();
    }
    public function GetSessionToUpdate($id){
        $session = $this->_sessionRepository->GetById($id);
        if ($session == null)
            return null;
        return $session;
    }
    public function UpdateSession($id, $request){
        $data = $request->except(['_token', '_method']);
        try{
            $this->_sessionRepository->Update($id, $data);
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function CreateSession($request){
        $data = $request->except(['_token']);
        try{
            $this->_sessionRepository->Create($data);
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }
    public function DeleteSession($id){
        try{
            $this->_sessionRepository->Delete($id);
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

}





?>
