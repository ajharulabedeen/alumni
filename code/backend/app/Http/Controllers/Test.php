<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['t']]);
    }


    public function t(request $request)
    {
        // return "Alhumdulilah...!";
        error_log("FILE Con");
        error_log($request->hasFile('photo'));
        error_log($request->photo);

        $fileName = $request->photo->getClientOriginalName();

        if($request->hasFile('photo')){
            error_log("FILE RECEIVED!");
        }
        return $request->photo->storeAs('public', $fileName);
    }
}
