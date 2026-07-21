<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Services\IService\IMemberService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseStatusCodeSame;

class MemberController extends Controller
{
    private IMemberService $_memberService;

    public function __construct(IMemberService $memberService){
        $this->_memberService = $memberService;
    }

    public function index()
    {
        //
        $members = $this->_memberService->GetAllMembers();
        // return response()->json($members);
        if($members == null) return response()->json([
                                'message' => 'No Members',
                                'success' => false]);
        return response()->json([
                            'data' => $members,
                            'success' => true]);

    }


    public function store(Request $request)
    {
        //
        $res = $this->_memberService->CreateMember($request);
        // if($res) return redirect()->route('members.index')->with('Success', 'Member created successfully.');
        // else return redirect()->route('members.index')->with('Error', 'Failed to create member.');
        if($res) return response()->json(['message' => 'Member created successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Create Member .' ,
                                         'success' => false]);
    }


    public function show($id)
    {
        //
        $member = $this->_memberService->GetMemberById($id);
        if(!$member)
            return response()->json([
                            'message' => "Member is Not Found",
                            'success' => false] , 404);
        return response()->json([
                            'data' => $member,
                            'success' => true] , 200);
    }


    public function update(Request $request, $id)
    {
        //
        // return $id;
        $res = $this->_memberService->UpdateMember($request , $id);  // in postman i send data in raw-> jsonTypr

        if($res) return response()->json(['message' => 'Member Updated successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Update Member .' ,
                                         'success' => false]);

    }


    public function destroy($id)
    {
        //
        $res = $this->_memberService->DeleteMember($id);

        if($res) return response()->json(['message' => 'Member Deleted successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Delete Member .' ,
                                         'success' => false]);
    }

    public function GetHealthRecordData(int $id){

        $healthRecord = $this->_memberService->GetHealthRecord($id);
        if(!$healthRecord) return response()->json(['message' => 'HealthRecord For Member with id '.$id.' is Not Found .' ,
                                         'success' => false]);

        else return response()->json(['data' =>  $healthRecord ,
                                         'success' => true]);
    }
}
