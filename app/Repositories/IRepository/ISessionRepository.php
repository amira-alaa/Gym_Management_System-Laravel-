<?php
namespace App\Repositories\IRepository;


interface ISessionRepository
{
    public function GetAll();
    public function GetById($id);
    public function GetAllTrainers();
    public function GetAllCategories();
    public function Update($id, $data);
    public function Create($data);
    public function Delete($id);
    public function GetUpComingSessions();
    public function GetOnGoingSessions();
    public function GetCompletedSessions();
}







?>
