<?php
namespace App\Repositories\IRepository;

interface IPlanRepository{
    public function GetAll();
    public function GetByID($id);
    public function Update($id, $data);
   
}




?>
