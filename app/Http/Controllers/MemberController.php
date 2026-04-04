<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Enums\Gender;
use App\Services\IService\IMemberService;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private IMemberService $_memberService;

    public function __construct(IMemberService $memberService){
        $this->_memberService = $memberService;
    }
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all members
        $members = $this->_memberService->GetAllMembers();
        return view('Member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // go to add member view
        return view('Member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        // insert new member
            $res = $this->_memberService->CreateMember($request);
            if($res) return redirect()->route('members.index')->with('Success', 'Member created successfully.');
            else return redirect()->route('members.index')->with('Error', 'Failed to create member.');

    }

    /**
     * Display the specified resource.
     *
    //  * @param  \App\Models\Member  $member
    //  * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // get member by id
        $member = $this->_memberService->GetMemberById($id);
        return view('Member.MemberDetails', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // go to edit view
        $membertoupdate = $this->_memberService->GetMemberById($member->id);
        return view('Member.edit' , compact('membertoupdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     */
    public function update(UpdateMemberRequest $request, int $id)
    {
        // update member

        $res = $this->_memberService->UpdateMember($request , $id);
        if($res) return redirect()->route('members.index')->with('Success', 'Member updated successfully.');
        else return redirect()->route('members.index')->with('Error', 'Failed to update member.');
    }
    public function delete($id){
        return view('Member.delete' , compact('id'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member

     */
    public function destroy($id)
    {
        // delete member
        $res = $this->_memberService->DeleteMember($id);
        if($res) return redirect()->route('members.index')->with('Success', 'Member deleted successfully.');
        else return redirect()->route('members.index')->with('Error', 'Failed to delete member.');
    }

    public function GetHealthRecordData(int $id){

        $healthRecord = $this->_memberService->GetHealthRecord($id);
        // return $healthRecord['height'] . ',' . $healthRecord['weight'] . ',' . $healthRecord['blood_type'] . ',' . $healthRecord['note'];
        return view('Member.HealthRecordDetails' , compact('healthRecord'));

    }
}
