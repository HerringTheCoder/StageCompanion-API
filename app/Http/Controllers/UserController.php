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
}
