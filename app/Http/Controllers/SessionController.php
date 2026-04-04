<?php

namespace App\Http\Controllers;

use App\Http\Requests\Session\StoreSessionRequest;
use App\Http\Requests\Session\UpdateSessionRequest;
use App\Models\Session;
use App\Services\IService\ISessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    private ISessionService $_sessionService;

    public function __construct(ISessionService $sessionService)
    {
        $this->_sessionService = $sessionService;
    }
    public function index()
    {
        // get all sessions for the user
        $sessions = $this->_sessionService->getAllSessions();
        return view('Session.index', compact('sessions'));

    }


    public function create()
    {
        //
        $trainers = $this->_sessionService->GetAllTrainers();
        $categories = $this->_sessionService->GetAllCategories();
        return view('Session.create', compact('trainers', 'categories'));
    }


    public function store(StoreSessionRequest $request)
    {
        //
        $flag = $this->_sessionService->CreateSession($request);
        if ($flag)
            return redirect()->route('sessions.index')->with('Success', 'Session created successfully');
        else
            return redirect()->route('sessions.index')->with('Error', 'Failed to create session');

    }


    public function show($id)
    {
        //
        $session = $this->_sessionService->GetSessionById($id);
        // return $session;
        return view('Session.sessionDetails', compact('session'));
    }


    public function edit($id)
    {
        // got to edit session page
        $trainers = $this->_sessionService->GetAllTrainers();
        $session = $this->_sessionService->GetSessionToUpdate($id);
        // return $session;
        return view('Session.edit', compact('trainers', 'session'));
    }


    public function update(UpdateSessionRequest $request, $id)
    {
        //
        // return $request;
        $flag = $this->_sessionService->UpdateSession($id, $request);

        if ($flag)
            return redirect()->route('sessions.index')->with('Success', 'Session updated successfully');
        else
            return redirect()->route('sessions.index')->with('Error', 'Failed to update session');
    }

    public function delete($id)
    {
        return view('Session.delete', compact('id'));
    }
    public function destroy($id)
    {
        //
        $flag = $this->_sessionService->DeleteSession($id);
        if ($flag)
            return redirect()->route('sessions.index')->with('Success', 'Session deleted successfully');
        else
            return redirect()->route('sessions.index')->with('Error', 'Failed to delete session');

    }
}
