<?php

namespace App\Http\Controllers;

use App\File;
use App\Folder;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;


class FileController extends Controller
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
            $files = Folder::where('owner_id', $request->auth->id)->files;
        } catch (FileNotFoundException $exception) {
            return response()->json([
                'error' => 'Files not found.'
            ], 404);
        }
        return response()->json($files, 200);
    }

    public function show(Request $request)
    {
        return response()->json($request->auth);
    }
}
