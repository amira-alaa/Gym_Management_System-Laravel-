<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Session\StoreSessionRequest;
use App\Http\Requests\Session\UpdateSessionRequest;
use App\Services\IService\ISessionService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SessionController extends Controller
{
    private ISessionService $_sessionService;

    public function __construct(ISessionService $sessionService)
    {
        $this->_sessionService = $sessionService;
    }

    public function index()
    {
        //
        $sessions = $this->_sessionService->getAllSessions();
        if($sessions == null || count($sessions) == 0) return response()->json([
                                                'message' => 'No Sessions Available',
                                                'success' => false
                                            ]);
        return response()->json([
                                    'data' => $sessions,
                                    'success' => true
                                ]);
    }


    public function store(StoreSessionRequest $request)
    {
        //
        // return $request;
        $flag = $this->_sessionService->CreateSession($request);

        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Store Session',
                                        'success' => false,

                                    ]);
            return response()->json([
                                    'message' => 'Session is Stored Successfully',
                                    'success' => true ,

                                ]);
    }


    public function show($id)
    {
        //
        $session = $this->_sessionService->GetSessionById($id);
        if($session == null) return response()->json([
                                                'message' => 'Session is Not Found',
                                                'success' => false
                                            ]);
        return response()->json([
                                    'data' => $session,
                                    'success' => true
                                ]);

    }


    public function update(UpdateSessionRequest $request, $id)
    {
        //
        $flag = $this->_sessionService->UpdateSession($id, $request);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Update Session',
                                        'success' => false,

                                    ]);
            return response()->json([
                                    'message' => 'Session is Updated Successfully',
                                    'success' => true ,

                                ]);
    }


    public function destroy($id)
    {
        //
        $flag = $this->_sessionService->DeleteSession($id);
        if (!$flag)
            return response()->json([
                                        'message' => 'Failed To Delete Session',
                                        'success' => false,

                                    ]);
            return response()->json([
                                    'message' => 'Session is deleted Successfully',
                                    'success' => true ,

                                ]);
    }
}
