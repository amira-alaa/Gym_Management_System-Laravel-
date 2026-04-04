<?php
namespace App\Services\IService;

interface ISessionService
{
    public function GetAllSessions();
    public function GetSessionById($id);
    public function GetAllTrainers();
    public function GetAllCategories();
    public function GetSessionToUpdate($id);
    public function UpdateSession($id, $request);
    public function CreateSession($request);
    public function DeleteSession($id);
}




?>
