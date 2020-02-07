<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\Services\InvitationService;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InvitationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InvitationService $invitation)
    {
        $this->invitation = $invitation;
        $this->middleware('jwt.auth');
    }
    /**
     * Sends an invite to user specified by email.
     * Requires inputting target 'email' and current 'band_id' in request.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);
        return $this->invitation->send($request);
    }
    /**
     * Accepts a specific invite.
     * Requires providing an 'invitation id'.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function accept(Request $request)
    {
        $this->validate($request, [
            'invitation_id' => 'required|exists:invitations,id'
        ]);
        return $this->invitation->accept($request);
    }
}
