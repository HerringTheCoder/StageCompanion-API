<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\Services\InvitationService;

class InvitationController extends Controller
{

    public function __construct(InvitationService $invitationService)
    {
        $this->invitationService = $invitationService;
        $this->middleware('jwt.auth');
    }

    public function invite(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        return $this->invitationService->send($request);
    }

    public function accept(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:invitations,id'
        ]);

        return $this->invitationService->accept($request);
    }

    public function index(Request $request)
    {
       $invitations = Invitation::query()
       ->with('band')
       ->where('user_id',$request->auth->id)
       ->where('accepted',false)
       ->get();

       return $invitations;
    }

    public function delete(int $id)
    {
        $invitation = Invitation::query()
        ->where('id', $id)
        ->first();
        $invitation->delete();

        return response()->json(['message' => 'Invitation declined']);
    }
}
