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

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function profile(Request $request)
    {
        return response()->json($request->auth);
    }
}
