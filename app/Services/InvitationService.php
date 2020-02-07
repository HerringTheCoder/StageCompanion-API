<?php

namespace App\Services;

use App\User;
use App\Invitation;
use App\Band;
use Illuminate\Http\Request;

class InvitationService
{

    public function accept(Request $request)
    {
        $invitation = Invitation::find($request->invitation_id);
        if($request->auth->id !== $invitation->user_id){
            return response()->json([
                'error'=>'The user is not authorized for this operation.'
            ], 401);
        }
        Band::find($invitation->band_id)->users()->attach($request->auth, ['role' => '']);
        $invitation->update(['accepted'=>'true']);
        return response()->json([
            'message'=>'Invitation accepted.'
        ]);
    }

    public function send(Request $request)
    {
    $user_id = User::where('email',$request->email)->first()->id;
    $band_id = $request->band_id;
    $invitation = Invitation::firstOrCreate(['user_id' => $user_id, 'band_id'=>$band_id], ['accepted'=>false]);
    //TODO: mail notification?
    return response()->json(['message'=>'Invitation sent successfully.']);
    }
}
