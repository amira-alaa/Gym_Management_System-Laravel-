<?php
namespace App\Services\IService;

interface ITrainerService
{
    public function GetAllTrainers();
    public function GetTrainerById($id);
    public function CreateTrainer($request);
    public function GetTrainerToUpdate($id);
    public function UpdateTrainer($id, $request);
    public function DeleteTrainer($id);
}


?>
