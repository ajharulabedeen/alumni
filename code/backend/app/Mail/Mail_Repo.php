<?php

namespace App\Mail;

use App\Utils\Utils;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/26/2020
 * Time: 1:17 PM
 */
class Mail_Repo
{

    /**
     * @return string 6 digit random number, will be send for mail verification.
     */
    public function getRandomNumber(): string
    {
        $code = "";
        for ($x = 0; $x < 6; $x++) {
            $code = $code . rand(0, 9);
        }
        return $code;
    }

    public function getLoggedUserMail(): string
    {
        return Utils::getLoggerEmailId();
    }

    public function saveVerificationCode(string $sentRandomCode)
    {
        $mailVerification = new MailVerification();
        $mailVerification->user_email = Utils::getLoggerEmailId();
        $mailVerification->user_id = Utils::getUserId();
        $mailVerification->sent_code = $sentRandomCode;
        $mailVerification->sent_date = date("Y-m-d h:i:s");;
        $id = '';
        try {
            $id = $mailVerification->save();
        } catch (\Exception $e) {
            $id = "fail";
            dd($e);
            error_log("Error in Saving, sent verification Code!");
        }
        return $id;
    }


}// class