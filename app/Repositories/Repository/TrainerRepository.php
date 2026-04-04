<?php
namespace App\Repositories\Repository;

use App\Models\Trainer;
use App\Repositories\IRepository\ITrainerRepository;

class TrainerRepository implements ITrainerRepository
{
    // Implement the methods defined in ITrainerRepository
    // For example:
    public function GetAll()
    {
        return Trainer::all(); // Assuming you have a Trainer model
    }

    public function GetById($id)
    {
        return Trainer::findOrFail($id);
    }

    public function Create($data)
    {
        return Trainer::create($data);
    }

    public function Update($id, $data)
    {
        return Trainer::findOrFail($id)->update($data);
    }

    public function Delete($id)
    {
        return Trainer::findOrFail($id)->delete();
    }

}




?>
