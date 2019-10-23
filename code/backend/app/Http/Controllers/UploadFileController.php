<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function update(request $request)
    {
        error_log($request->hasFile('photo'));
        error_log($request->photo);

        if($request->hasFile('photo')){
            error_log("FILE RECEIVED!");
        }
        return $request->photo->store('public');
    }

}
