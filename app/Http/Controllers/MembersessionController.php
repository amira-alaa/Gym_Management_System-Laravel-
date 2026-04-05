<?php

namespace App\Http\Controllers;

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
        return view('MemberSession.MembersForUpcomingSession' , compact('members'));
    }
    public function GetMembersOngoingSession($session_id){
        $members = $this->_membersessionService->GetMembersOfOngoingSession($session_id);
        return view('MemberSession.MembersForOngoingSession' , compact('members'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
