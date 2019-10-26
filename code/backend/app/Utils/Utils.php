<?php
namespace App\Utils;
use Illuminate\Foundation\Auth\User;
use PHPUnit\Framework\Exception;

class Utils{

    public static function getUserId(){
        $currentLoggedMail = "gub.cse.files@gmail.com";
        try{
            $userID = User::select('id')->where('email', $currentLoggedMail)->get()[0]->id;
        }catch(Exception $e){
            error_log("Error In Getting user ID of the current Logged user.");
        }
        return $userID;

    }
}//class
