<?php

namespace App\Http\Controllers;

use App\Folder;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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
     * Folders - Show all
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        try {
            $folders = Folder::where('owner_id', $request->auth->id)->get();
        } catch (NotFoundResourceException $exception) {
            return response()->json([
                'error' => 'Folders not found.'
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json($folders);
    }


    /**
     * Folders - show by Id
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request)
    {
        return response()->json($request->auth);
    }

    /**
     * Folders - create new
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_id' => 'exists:users,id',
            'name' => 'required'
        ]);

        $folder = new Folder();
        $folder->owner_Id = $request['owner_id'];
        $folder->name = $request['name'];
        $folder->save();

        return response()->json(['message' => 'Folder created successfully.']);
    }

    /**
     * Folders - update
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'owner_id' => 'required, exists:users,id',
            'name' => 'required'
        ]);
        $folder = Folder::query()->where('id', $request->id)->first();
        $folder->owner_Id = $request["owner_id"];
        $folder->name = $request["name"];

        return response()->json(['message' => 'Folder updated successfully.']);
    }
    /**
     * Folders - delete by Id
     *
     * @param integer $folderId
     * @return void
     */
    public function delete(int $folderId)
    {
        $files = File::query()->select('name')->where('folder_id', $folderId)->get();
        Storage::delete($files);
        File::query()->where('folder_id', $folderId)->delete();
        $folder = Folder::query()->where('id', $folderId)->first();
        $folder->delete();

        return response()->json(['message' => 'Folder deleted successfully.']);
    }
}
