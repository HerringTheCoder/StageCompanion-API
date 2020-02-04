<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Return list of all users
     * @return JSON
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    /**
     * Return current user's profile
     * @return JSON
     */
    public function profile(Request $request)
    {
        return response()->json($request->auth);
    }

    /**
     * Validate and update user's name, then return operation status
     * @return JSON
     */
    public function update(Request $request)
    {
        if($request->name){
        $this->validate($request, [
            'name' => 'min:5|max:20'
        ]);
        $user = $request->auth;
        $user->name = $request->name;
        $user->save();
        return response()->json([
            'message' => 'Your name has been updated.'
        ]);
    }
    else
    return response()->json([
        'message' => 'There was nothing to update.'
    ]);
    }
}
