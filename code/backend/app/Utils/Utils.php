<?php

namespace App\Utils;

use Illuminate\Foundation\Auth\User;
use PHPUnit\Framework\Exception;

class Utils
{

    /**
     * @return userID userID of the current logged user will be back. Not the email address, it is the primary key.
     * @uses   for security purpose, so out the system, will not able to logged in.
     */
    public static function getUserId()
    {
        //refactor
//        // $currentLoggedMail = "gub.cse.+files@gmail.com";
//        error_log("Auth User : " . auth()->user());
//        $currentLoggedMail = auth()->user()->email;
//        // $currentLoggedMail = "u1@umail.com";
//        error_log("currentLoggedMail : " . $currentLoggedMail);
//        try{
//            $userID = User::select('id')->where('email', $currentLoggedMail)->get()[0]->id;
//        }catch(Exception $e){
//            error_log("Error In Getting user ID of the current Logged user.");
//        }
//        return $userID;
        return "9";
    }

    /**
     * @return email logged user email will be returned!
     */
    public static function getLoggerEmailId(): string
    {
        //refactor
//        $currentLoggedMail = auth()->user()->email;
        return "cse1301096@gmail.com";
    }
}//class
