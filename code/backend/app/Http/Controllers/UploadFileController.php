<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function __construct()
    {
        error_log("Constructor : upload");
        // $this->middleware('auth:api', ['except' => ['uploadfile']]);
        $this->middleware('auth:api', ['except' => ['uploadfile']]);
        error_log("Constructor after : upload");
    }


    public function update(request $request)
    {
        error_log($request->hasFile('photo'));
        error_log($request->photo);

        $fileName = $request->photo->getClientOriginalName();

        if ($request->hasFile('photo')) {
            error_log("FILE RECEIVED!");
        }
        return $request->photo->storeAs('public', $fileName);
    }

    public function getFile()
    {
        return response()->download(storage_path('app/public/' . 'avatar.jpg'), null, [], null);
    }
}//class
