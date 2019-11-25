<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile_Photo_Controller extends Controller
{
    public function __construct()
    {
        error_log("Constructor : upload");
        // $this->middleware('auth:api', ['except' => ['uploadfile']]);
        error_log("Constructor after : upload");
    }


    public function upload(request $request)
    {
        $extension = $request->file('photo')->extension();
        $fileName = auth()->user()->email;
        $fileName =  $fileName . "." . $extension;

        if ($request->hasFile('photo')) {
            error_log("FILE RECEIVED!");
        }
        return $request->photo->storeAs('public', $fileName);
    }

    public function getFile()
    {
        $fileName = auth()->user()->email;
        return response()->download(storage_path('app/public/' . '$fileName'), null, [], null);
    }
}//class
