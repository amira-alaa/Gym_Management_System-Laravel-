<?php
namespace App\Repositories\IRepository;

interface ITrainerRepository
{
    public function GetAll();
    public function GetById($id);
    public function Create($data);
    public function Update($id, $data);
    public function Delete($id);
}


?>
