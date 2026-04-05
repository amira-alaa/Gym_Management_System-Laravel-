<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberSession\CreateMemberSessionRequest;
use App\Services\IService\IMembersessionService;
use App\Models\Membersession;
use Illuminate\Http\Request;

class MembersessionController extends Controller
{
    private IMembersessionService $_membersessionService;
    public function __construct(IMembersessionService $membersessionService)
    {
        $this->_membersessionService = $membersessionService;
    }

    public function index()
    {
        $sessions = $this->_membersessionService->GetNotcompletedSessions();
        return view('MemberSession.index' , compact('sessions'));
    }

    public function GetMembersUpcomingSession($session_id){
        // return "yes";
        $members = $this->_membersessionService->GetMembersOfUpcomingSession($session_id);
        return view('MemberSession.MembersForUpcomingSession' , compact('members' , 'session_id'));
    }
    public function GetMembersOngoingSession($session_id){
        $members = $this->_membersessionService->GetMembersOfOngoingSession($session_id);
        return view('MemberSession.MembersForOngoingSession' , compact('members'));
    }




    public function create()
    {
        //
        // $members = $this->_membersessionService->GetAllMembers();
        // return view('MemberSession.create' , compact('members'));
    }


    public function store(CreateMemberSessionRequest $request)
    {
        //
        $flag = $this->_membersessionService->CreateMemberSession($request);
        
        if($flag)
            return redirect()->route('membersessions.GetMembersUpcomingSession' , $request->session_id)->with('Success' , 'MemberSession Created Successfully');
        else
            return redirect()->route('membersessions.GetMembersUpcomingSession', $request->session_id)->with('Error' , 'Failed To Create Membersession');

        // return $request;
    }


    public function show($session_id)
    {
        // go to create view
        $members = $this->_membersessionService->GetAllMembers();
        return view('MemberSession.create' , compact('members' , 'session_id' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //

        $flag = $this->_membersessionService->IsAttended($request->session_id , $request->member_id);

        if($flag)
            return back()->with('Success', 'MemberSession updated successfully');
        else
            return back()->with('Error', 'Failed to update membersession');
    }


    public function destroy(Request $request ,$session_id)
    {
        //
        // return $request ;
        $flag = $this->_membersessionService->DeleteMemberSession($request->session_id , $request->member_id);

        if($flag)
            return back()->with('Success', 'MemberSession deleted successfully');
        else
            return back()->with('Error', 'Failed to delete membersession');
    }
}
