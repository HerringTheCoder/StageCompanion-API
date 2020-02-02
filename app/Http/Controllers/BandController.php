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

    public function index()
    {
        $bands = Band::all();
        return response()->json($bands);
    }

    public function show(Request $request)
    {
        $band = $request->auth->band;
        return response()->json($band);
    }
}
