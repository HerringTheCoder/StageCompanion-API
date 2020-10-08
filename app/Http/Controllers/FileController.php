<?php

namespace App\Http\Controllers;

use App\File;
use App\Folder;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
            $files = Folder::query()->where('owner_id', $request->auth->id)->get();
        } catch (FileNotFoundException $exception) {
            return response()->json([
                'error' => 'Files not found.'
            ], Response::HTTP_NO_CONTENT);
        }
        return response()->json($files);
    }

    public function show(int $id)
    {
        $file = File::query()->where("id", $id);
        return response()->json($file);
    }

    public function store(Request $request)
    {
        if ($request->content != null) {
            $uploadedFile = base64_decode($request->content);
            $filename = "sc-" . $request->name . "." . $request->extension;
            Storage::put("files" . "/" . $filename, $uploadedFile);

            $file = new File();
            $file->folder_id = $request->folder_id;
            $file->name = $filename;
            $file->extension = $request->extension;
            $file->path = 'files';
            $file->save();
        }
    }

    public function delete(int $id)
    {
        $file = File::query()->where("id", $id)->first();
        Storage::delete($file->path . "/" . $file->name);
        $file->delete();
        return response()->json("File deleted successfully");
    }
}
