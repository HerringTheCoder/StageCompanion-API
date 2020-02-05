<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;

class BandController extends Controller
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
     * Return all bands in system
     * @return JSON
     */
    public function index(Request $request)
    {
        $bands = $request->auth->bands;
        return response()->json($bands);
    }
    /**
     * Return current user's specific band
     * @return JSON
     */
    public function show(Request $request)
    {
        $band = $request->auth->bands;
        return response()->json($band);
    }
    /**
     * Creates a new band
     * @return JSON
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
        $band->users()->attach($request->auth, ['role'=>'Leader']);
        return response()->json(['message'=>'Band created successfully.'], 201);
    }

    public function update(Request $request)
    {
        if($request->name)
        {
        $this->validate($request,[
            'name' => 'min:3|max:30'
        ]);
        return response()->json(['message'=>'Band updated successfully.']);
        }
        else
        return response()->json(['message'=>'There was nothing to update.']);
    }
}
