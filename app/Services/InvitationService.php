<?php

namespace App\Services;

use App\User;
use App\Invitation;
use App\Band;
use App\Folder;
use Illuminate\Http\Request;

class InvitationService
{

    public function accept(Request $request)
    {
        $invitation = Invitation::find($request->id);
        if($request->auth->id !== $invitation->user_id){
            return response()->json([
                'error'=>'The user is not authorized for this operation.'
            ], 401);
        }
        $band = Band::find($invitation->band_id);
        $band->users()->attach($invitation->user_id, ['role' => $invitation->role]);

        $folder = new Folder();
        $folder->band_Id = $band->id;
        $folder->name = $band->name . '-' . $invitation->role;
        $folder->owner_Id = $invitation->user_id;
        $folder->save();
        $invitation->delete();

        return response()->json([
            'message'=>'Invitation accepted.'
        ]);
    }

    public function send(Request $request)
    {
    $user_id = User::where('email',$request->email)->first()->id;
    $invitation = new Invitation();
    $invitation->user_id = $user_id;
    $invitation->band_id = $request->band_id;
    $invitation->role = $request->role;
    $invitation->accepted = false;
    $invitation->save();
    //TODO: mail notification?
    return response()->json(['message'=>'Invitation sent successfully.']);
    }
}
