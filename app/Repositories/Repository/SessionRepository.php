<?php
namespace App\Repositories\Repository;

use App\Repositories\IRepository\ISessionRepository;
use App\Models\Session;
use App\Models\Category;

use App\Models\Trainer;

class SessionRepository implements ISessionRepository
{
    public function GetAll()
    {
        return Session::with('category', 'trainer', 'members')->get();
    }

    public function GetById($id)
    {
        return Session::with('category', 'trainer', 'members')->find($id);
    }
    public function GetAllTrainers()
    {
        return Trainer::all();
    }
    public function GetAllCategories()
    {
        return Category::all();
    }
    public function Update($id, $data){
        return Session::findOrFail($id)->update($data);
    }
    public function Create($data){
        return Session::create($data);
    }
    public function Delete($id){
        return Session::findOrFail($id)->delete();
    }
    public function GetUpComingSessions(){
        return Session::where('start_time', '>' , now())->get();

    }
    public function GetOnGoingSessions(){
        return Session::where('start_time' ,'<' , now())->where('end_time' , '>' , now())->get();
    }
    public function GetCompletedSessions(){
        return Session::where('end_time' , '<' , now() )->get();
    }
}









?>
