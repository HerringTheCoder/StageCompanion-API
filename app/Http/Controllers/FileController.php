<?php

namespace App\Http\Controllers;

use App\File;
use App\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Files - show all
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $files = File::all();
        return response()->json($files);
    }

    /**
     * Files - show by folder Id
     *
     * @param Request $request
     * @param integer $folderId
     * @return void
     */
    public function showByFolderId(Request $request, int $folderId)
    {
        $files = File::query()->where("folder_id", $folderId)->get();

        return response()->json($files);
    }

    /**
     * Files - show all owned by current user
     *
     * @param Request $request
     * @return void
     */
    public function showOwned(Request $request)
    {
        $authorizedFolderIds = Folder::query()
            ->where("owner_id", $request->auth->id)
            ->get(["id"]);

        $files = File::query()
            ->whereIn("folder_id", $authorizedFolderIds)
            ->get();

        return response()->json($files);
    }

    /**
     * Files - show file by Id
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function show(Request $request, int $id)
    {
        $file = File::query()
            ->where("id", $id)
            ->first();

        $content = Storage::get($file->path . "/" . $file->name);
        $file->content = base64_encode($content);

        return response()->json($file->makeVisible('content')->toArray());
    }

    /**
     * Files - upload file to band folder
     *
     * @param Request $request
     * @return void
     */
    public function storeBandFile(Request $request)
    {
        if ($request->content != null) {

            $folder = Folder::query()
            ->where('band_id', $request->band_id)
            ->where('owner_id', $request->user_id)
            ->get('id')
            ->first();

            $file = new File();
            $file->name = "undefined";
            $file->folder_id = $folder->id;
            $file->extension = $request->extension;
            $file->path = "files";
            $file->save();

            $uploadedFile = base64_decode($request->content);
            $filename = $request->name . "-" . $file->id . "." . $request->extension;
            $isSuccess = Storage::put("files" . "/" . $filename, $uploadedFile);
            if (!$isSuccess) {
                $file->delete();
                return response()->json("File creation under path " . "files" . "/" . $filename . "unsuccessful.");
            }
            $file->name = $filename;
            $file->update();

            return response()->json([
                "messsage" => "File was saved successfully."
            ]);
        }
        return response()->json([
            "message" => "No file content found"
        ]);
    }

    /**
     * Files - upload new
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if ($request->content != null) {
            $file = new File();
            $file->name = "undefined";
            $file->folder_id = $request->folder_id;
            $file->extension = $request->extension;
            $file->path = "files";
            $file->save();

            $uploadedFile = base64_decode($request->content);
            $filename = $request->name . "-" . $file->id . "." . $request->extension;
            $isSuccess = Storage::put("files" . "/" . $filename, $uploadedFile);
            if (!$isSuccess) {
                $file->delete();
                return response()->json("File creation under path " . "files" . "/" . $filename . "unsuccessful.");
            }
            $file->name = $filename;
            $file->update();

            return response()->json([
                "messsage" => "File was saved successfully."
            ]);
        }
    }

    /**
     * Files - delete by Id
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        $file = File::query()->where("id", $id)->first();
        Storage::delete($file->path . "/" . $file->name);
        $file->delete();
        return response()->json("File deleted successfully");
    }

    /**
     * Files - clean local storage
     *
     * @return void
     */
    public function deleteAll()
    {
        Storage::cleanDirectory("files");
        File::all()->delete();
    }
}
