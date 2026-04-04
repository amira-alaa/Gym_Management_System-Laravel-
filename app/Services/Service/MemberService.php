<?php
namespace App\Services\Service;

use App\Services\IService\IMemberService;
use App\Repositories\IRepository\IMemberRepository;
use Illuminate\Http\Request;

class MemberService implements IMemberService{

	private IMemberRepository $_memberRepo;

	public function __construct(IMemberRepository $memberRepo){
		$this->_memberRepo = $memberRepo;
	}
	public function GetAllMembers() {
		return $this->_memberRepo->GetAll();
	}

	public function GetMemberById(int $id) {
		return $this->_memberRepo->GetById($id);
	}

	public function GetHealthRecord(int $id) {
		return $this->_memberRepo->GetHealthRecord($id);
	}

	public function CreateMember(Request $request) {
		// Implementation for creating a member

		$data = $request->except(['_token','health_record_height' , 'health_record_weight' , 'health_record_blood_type' , 'health_record_note']);

		$data['health_record'] =[
			'height' => $request->input('health_record_height'),
			'weight' => $request->input('health_record_weight'),
			'blood_type' => $request->input('health_record_blood_type'),
			'note' => $request->input('health_record_note')
		];

		try{
			$this->_memberRepo->Create($data);
			return true;
		}catch(\Exception $ex){
			return false ;
		}

	}


	public function UpdateMember(Request $request , $id) {
		// Implementation for updating a member
		$data = $request->except(['_token' , '_method']);


		try{
			$this->_memberRepo->Update($id, $data);
			return true;
		}catch(\Exception $ex){
			return false ;
		}
	}

	public function DeleteMember(int $id) {
		// Implementation for deleting a member
		try{
			$this->_memberRepo->Delete($id);
			return true;
		}catch(\Exception $ex){
			return false ;
		}
	}
}





?>
