<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class FolderController extends Controller
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

    public function index(Request $request)
    {
        try {
            $folders = Folder::where('owner_id', $request->auth->id);
        } catch (NotFoundResourceException $exception) {
            return response()->json([
                'error' => 'Folders not found.'
            ], 404);
        }
        return response()->json($folders, 200);
    }

    public function show(Request $request)
    {
        return response()->json($request->auth, 200);
    }
}
