<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use App\User;
class InvitationController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
    /**
     * Sends an invite to user specified by email.
     * Requires inputting target email and current band_id in request.
     * @return JSON
     */
    public function invite(Request $request)
    {
        if($request->email)
        {
            $this->validate($request, [
                'email' => 'email|exists:users,email'
            ]);
        $user_id = User::where('email',$request->email)->first()->id;
        $band_id = $request->band_id;
        $invitation = Invitation::firstOrCreate(['user_id' => $user_id, 'band_id'=>$band_id], ['accepted'=>false]);
        return response()->json(['message'=>'Invitation sent successfully.']);
        }
        else
        return response()->json(['message'=>'There was no email specified.']);
    }
}
