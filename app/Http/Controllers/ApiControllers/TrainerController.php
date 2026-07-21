<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trainer\StoreTrainerRequest;
use App\Http\Requests\Trainer\UpdateTrainerRequest;
use App\Services\IService\ITrainerService;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    private ITrainerService $_trainerService;
    public function __construct(ITrainerService $trainerService)
    {
        $this->_trainerService = $trainerService;
    }
    public function index()
    {
        //
        $trainers = $this->_trainerService->GetAllTrainers();
        if($trainers == null) return response()->json([
                                'message' => 'No Trainers Available',
                                'success' => false]);
        return response()->json([
                            'data' => $trainers,
                            'success' => true]);

    }


    public function store(StoreTrainerRequest $request)
    {
        //
        $res = $this->_trainerService->CreateTrainer($request);
        if($res) return response()->json(['message' => 'Trainer created successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Create Trainer .' ,
                                         'success' => false]);
    }


    public function show($id)
    {
        //
        $trainer = $this->_trainerService->GetTrainerById($id);
        if(!$trainer)
            return response()->json([
                            'message' => "Trainer is Not Found",
                            'success' => false] , 404);
        return response()->json([
                            'data' => $trainer,
                            'success' => true] , 200);
    }


    public function update(UpdateTrainerRequest $request, $id)
    {
        //
        $res = $this->_trainerService->UpdateTrainer($id , $request);
        if($res) return response()->json(['message' => 'Trainer Updated successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Update Trainer .' ,
                                         'success' => false]);
    }


    public function destroy($id)
    {
        //
        $res = $this->_trainerService->DeleteTrainer($id);
        if($res) return response()->json(['message' => 'Trainer Deleted successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Delete Trainer .' ,
                                         'success' => false]);

    }
}
