<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile\Profile_Basic_Repo_I;
use App\profile\ProfileBasic;
use App\Utils\Utils;

class Profile_Photo_Controller extends Controller
{
    protected $basicRepo;

    public function __construct(Profile_Basic_Repo_I $basicRepo )
    {
        $this->basicRepo = $basicRepo;
    }

    public function upload(request $request)
    {
        $extension = $request->file('photo')->extension();
        $fileName = auth()->user()->email;
        $fileName =  $fileName . "." . $extension;

        if ($request->hasFile('photo')) {
            error_log("FILE RECEIVED!");
        }

        $savedPhotoName = $request->photo->storeAs('public', $fileName);
        $profileBasic = $this->basicRepo->findOneByUser(Utils::getUserId());
        error_log(" savedPhotoName : " . $savedPhotoName);
        /**
         * no need to think about the image name length cause current user email will be the image name.
         */
        $profileBasic->image_address = $fileName;

        $this->basicRepo->update($profileBasic);
        return $savedPhotoName;
    }

    public function getPhoto()
    {
        $fileName = $this->basicRepo->findOneByUser(Utils::getUserId())->image_address;
        error_log($fileName);
        return response()->download(storage_path('app/public/' . $fileName), null, [], null);
    }
}//class
