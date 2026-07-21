<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberSession\CreateMemberSessionRequest;
use App\Services\IService\IMembersessionService;
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
        //
        $sessions = $this->_membersessionService->GetNotcompletedSessions();
        if($sessions == null) return response()->json([
                                'message' => 'No Not Completed Sessions Available',
                                'success' => false]);
        return response()->json([
                            'data' => $sessions,
                            'success' => true]);

    }


    public function GetMembersUpcomingSession($session_id){
        // return "yes";
        $members = $this->_membersessionService->GetMembersOfUpcomingSession($session_id);
        // return view('MemberSession.MembersForUpcomingSession' , compact('members' , 'session_id'));
        if($members == null) return response()->json([
                                'message' => 'No Members Available',
                                'success' => false]);
        return response()->json([
                            'data' => $members,
                            'success' => true]);
    }
    public function GetMembersOngoingSession($session_id){
        $members = $this->_membersessionService->GetMembersOfOngoingSession($session_id);
        // return view('MemberSession.MembersForOngoingSession' , compact('members'));
        if($members == null) return response()->json([
                                'message' => 'No Members Available',
                                'success' => false]);
        return response()->json([
                            'data' => $members,
                            'success' => true]);
    }

    public function store(CreateMemberSessionRequest $request)
    {
        //
        $res = $this->_membersessionService->CreateMemberSession($request);
        if($res) return response()->json(['message' => 'MemberSession created successfully' ,
                                            'success' => true]
                                        , 201);
        else return response()->json(['message' => 'Failed To Create MemberSession .' ,
                                         'success' => false]);

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        $flag = $this->_membersessionService->IsAttended($request->session_id , $request->member_id);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Attended MemberSession',
                                        'success' => false
                                    ]);
            return response()->json([
                                    'message' => 'MemberSession is Attended Successfully',
                                    'success' => true
                                ]);
    }


    public function destroy(Request $request , $id)
    {
        //
        $flag = $this->_membersessionService->DeleteMemberSession($request->session_id , $request->member_id);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Delete MemberSession',
                                        'success' => false
                                    ]);
        return response()->json([
                                    'message' => 'MemberSession is Deleted Successfully',
                                    'success' => true
                                ]);

    }
}
