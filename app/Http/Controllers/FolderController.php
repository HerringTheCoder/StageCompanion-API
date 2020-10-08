<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    /**
     * Return a list of folders belonging to user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        try {
            $folders = Folder::where('owner_id', $request->auth->id);
        } catch (NotFoundResourceException $exception) {
            return response()->json([
                'error' => 'Folders not found.'
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json($folders);
    }

    public function show(Request $request)
    {
        return response()->json($request->auth);
    }
}
