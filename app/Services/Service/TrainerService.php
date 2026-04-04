<?php
namespace App\Services\Service;

use App\Http\Resources\Trainer\GetTrainerToUpdateResource;
use App\Http\Resources\Trainer\GetTrainersResource;
use App\Http\Resources\Trainer\GetTrainerResource;
use App\Services\IService\ITrainerService;
use App\Repositories\IRepository\ITrainerRepository;

class TrainerService implements ITrainerService
{
    private ITrainerRepository $_trainerRepository;
    public function __construct(ITrainerRepository $trainerRepository)
    {
        $this->_trainerRepository = $trainerRepository;
    }
    public function GetAllTrainers()
    {
        $trainers = $this->_trainerRepository->GetAll();
        if($trainers == null || $trainers->isEmpty())
            return null;
        return GetTrainersResource::collection($trainers)->resolve();

    }

    public function GetTrainerById($id)
    {
        $trainer = $this->_trainerRepository->GetById($id);
        if($trainer == null)
            return null;
        $trainerVM = new GetTrainerResource($trainer);
        return $trainerVM->resolve();

    }

    public function CreateTrainer($request)
    {
        $data = $request->except('_token');
        try{
            $this->_trainerRepository->Create($data);
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }
    public function GetTrainerToUpdate($id){
        $trainer = $this->_trainerRepository->GetById($id);
        if($trainer == null)
            return null;
        $trainerVM = new GetTrainerToUpdateResource($trainer);
        return $trainerVM->resolve();
    }
    public function UpdateTrainer($id, $request)
    {
        $data = $request->except('_token' , '_method');
        try{
            $this->_trainerRepository->Update($id, $data);
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    public function DeleteTrainer($id)
    {
        try{
            $this->_trainerRepository->Delete($id);
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }
}


?>
