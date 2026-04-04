<?php
namespace App\Repositories\IRepository;
use Illuminate\Http\Request;

interface IMemberRepository{
    public function GetAll();
    public function GetById(int $id);
    public function GetHealthRecord(int $id);
    public function Create($data);
    public function Update(int $id, $data);
    public function Delete(int $id);
}

?>
