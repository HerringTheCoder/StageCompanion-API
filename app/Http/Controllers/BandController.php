<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\User;
use Illuminate\Http\Response;

class BandController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Bands - show all
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $bands = Band::all();

        return response()->json($bands);
    }

    /**
     * Bands - show by Id
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id)
    {
        $bands = Band::query()->where('id', $id)->with('users')->first();

        return response()->json($bands);
    }

    /**
     * Bands - show owned
     *
     * @param Request $request
     * @return void
     */
    public function showOwned(Request $request)
    {
        $bands = Band::query()
        ->where('leader_id', $request->auth->id)
        ->get();

        return response()->json($bands);
    }

    /**
     * Bands - show all with membership
     *
     * @param Request $request
     * @return void
     */
    public function showMembership(Request $request)
    {
        $user = User::find($request->auth->id);
        $bands = $user->bands;
        foreach($bands as $band)
        {
            $band = $band->users;
        }

        return response()->json($bands);
    }

    /**
     * Bands - create new
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:3|max:30'
        ]);
        $band = new Band();
        $band->name = $request->name;
        $band->leader_id = $request->auth->id;
        $band->save();
        $band->users()->attach($request->auth, ['role' => 'Leader']);

        return response()->json(['message' => 'Band created successfully.'], Response::HTTP_CREATED);
    }

    /**
     * Bands - update
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        if (!$request->name) {
            return response()->json(['message' => 'There was nothing to update.']);
        }
        $this->validate($request, [
            'name' => 'min:3|max:30'
        ]);
        Band::where('id', $request->id)->first()->update(['name' => $request->name]);
        return response()->json(['message' => 'Band updated successfully.']);
    }

    /**
     * Bands - leave
     *
     * @param Request $request
     * @param integer $bandId
     * @param string $userId
     * @return void
     */
    public function leave(Request $request, int $bandId, string $userId)
    {
        $user = User::query()
        ->where('id', $userId)
        ->first();

        $band = Band::query()
        ->where('id', $bandId)
        ->first();

        if($request->auth->id == $band->owner_id || $request->auth->id == $user->id)
        {
            $user->bands()->detach($band->id);
            return response()->json(['message' => 'Band left successfully']);
        }
        return response()->json(['message' => 'You are not allowed to detach user from band'], 401);
    }

    /**
     * Bands - delete
     *
     * @param Request $request
     * @param integer $bandId
     * @return void
     */
    public function delete(Request $request, int $bandId)
    {
        $band = Band::query()->where('id', $bandId)->first();
        $userId = $request->auth->id;
        if($band != null)
        {
            if($band->leader_id == $request->auth->id)
            {
                $band->delete();
            }
            else
            {
                return response()->json(['message' =>'You are not authorized to delete this band'], Response::HTTP_FORBIDDEN);
            }
        }

        return response()->json(['message'=>'Band deleted successfully.']);
    }
}
