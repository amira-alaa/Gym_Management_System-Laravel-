<?php
namespace App\Repositories\Repository;

use App\Models\Plan;
use App\Repositories\IRepository\IPlanRepository;

class PlanRepository implements IPlanRepository{

	public function GetAll() {
		return Plan::all();
	}

	public function GetByID($id) {
		return Plan::findOrFail($id);
	}

	public function Update($id, $data) {
		return Plan::findOrFail($id)->update($data);
	}


}



?>
