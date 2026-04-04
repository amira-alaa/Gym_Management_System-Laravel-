<?php

namespace App\Http\Controllers;

use App\Http\Requests\Trainer\StoreTrainerRequest;
use App\Http\Requests\Trainer\UpdateTrainerRequest;
use App\Models\Trainer;
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
        return view('Trainer.index', compact('trainers'));
    }

    
    public function create()
    {
        //
        return view('Trainer.create');
    }


    public function store(StoreTrainerRequest $request)
    {
        //
        $flag = $this->_trainerService->CreateTrainer($request);

        if($flag)
            return redirect()->route('trainers.index')->with('Success', 'Trainer created successfully.');
        else
            return redirect()->route('trainers.index')->with('Error', 'Failed to create trainer.');
    }


    public function show($id)
    {
        //
        $trainer = $this->_trainerService->GetTrainerById($id);
        return view('Trainer.details', compact('trainer'));
    }

   
    public function edit($id)
    {
        $trainer = $this->_trainerService->GetTrainerToUpdate($id);
        return view('Trainer.edit' , compact('trainer'));
    }

    
    public function update( UpdateTrainerRequest $request, $id)
    {
        $flag = $this->_trainerService->UpdateTrainer($id , $request);
        if($flag)
            return redirect()->route('trainers.index')->with('Success' , 'Trainer Updated Successfully .');
        else
            return redirect()->route('trainers.index')->with('Error' , 'Trainer Failed to Update .');
    }
    public function delete($id){
        return view('Trainer.delete' , compact('id'));

    }

    
    public function destroy($id)
    {
        //
        $flag = $this->_trainerService->DeleteTrainer($id);
        if($flag)
            return redirect()->route('trainers.index')->with('Success' , 'Trainer Deleted Successfully .');
        else
            return redirect()->route('trainers.index')->with('Error' , 'Trainer Failed to Delete .');
    }
}
