<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiUploadController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cvsUpload(Request $request)
    {
        if($request->hasFile('cvs')) {
            $fileName = date('d.m.y').time();
            $savedFileName = $request->file('cvs')
                    ->storeAs('doc', 'candidate-'.$fileName.'.'.$request->file('cvs')
                    ->getClientOriginalExtension());
            return response()->json(['fileName' => $savedFileName,'message' => 'Successfully uploaded!'], 200);
        }

        return response()->json(['message' => 'Error, file not found or can\'t upload file.'], 403);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCvsUploadedFile(Request $request)
    {
        if($request->has('delFile')) {
            Storage::delete($request->delFile);
            return response()->json(['message' => 'File '.$request->delFile.' deleted.']);
        }
        return response()->json(['error' => 'Error, file or filename not found.']);
    }

    public function posterImg(Request $request)
    {

    }
}
