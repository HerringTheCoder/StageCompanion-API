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
    public function index()
    {
        $bands = Band::all();
        return response()->json($bands);
    }
    /**
     * Return current user's specific band
     * @return JSON
     */
    public function show(Request $request)
    {
        $band = $request->auth->band;
        return response()->json($band);
    }
}
