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

    /**
     * Invitations - create new
     *
     * @param Request $request
     * @return void
     */
    public function invite(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        return $this->invitationService->send($request);
    }

    /**
     * Invitations - accept
     *
     * @param Request $request
     * @return void
     */
    public function accept(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:invitations,id'
        ]);

        return $this->invitationService->accept($request);
    }

    /**
     * Invitations - show all owned by user
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
       $invitations = Invitation::query()
       ->with('band')
       ->where('user_id',$request->auth->id)
       ->where('accepted',false)
       ->get();

       return $invitations;
    }

    /**
     * Invitations - delete by Id
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        $invitation = Invitation::query()
        ->where('id', $id)
        ->first();
        $invitation->delete();

        return response()->json(['message' => 'Invitation declined']);
    }
}
