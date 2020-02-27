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

    /**
     * @param string $sentRandomCode the code, that will be sent to the user by mail.
     * @return bool|string
     */
    public function saveVerificationCode(string $sentRandomCode)
    {
        //refactor
        /**
         * duplicate chck will be added later; cause at this it is not needed.
         * from fontend, once verfied mail, button will be disabled.
         */
        $check = $this->checkSendCode();
        error_log("$check : " . $check);
        $id = '';
        if ($check == 0) {
            $mailVerification = new MailVerification();
            $mailVerification->user_email = Utils::getLoggerEmailId();
            $mailVerification->user_id = Utils::getUserId();
            $mailVerification->sent_code = $sentRandomCode;
            $mailVerification->sent_date = date("Y-m-d h:i:s");
            $mailVerification->status = "0";
            try {
                $id = $mailVerification->save();
            } catch (\Exception $e) {
                $id = "fail";
                error_log("Error in Saving, sent verification Code!");
            }
        } else {
            $id = 'code_sent';
        }
        return $id;
    }

    /**
     * @param string $sentRandomCode this code will be inputed by the user, that he will receive in mail.
     */
    public function verification(string $receivedCode)
    {
        $user_id = Utils::getUserId();
        $user_mail = Utils::getLoggerEmailId();
        $mv = MailVerification::where('user_id', $user_id)->where('user_email', $user_mail)->get()[0];
        $sent_code = $mv->sent_code;
        $verification = "1";

        if ($sent_code == $receivedCode) {
            error_log('code match!');
            $mv->status = "1";
            $mv->received_code = date("Y-m-d h:i:s");
            $verification = $mv->update();
        } else {
            error_log('verification failed!');
            $verification = "0";
        }
        return $verification;
    }

    /**
     * @description To check, wheather the email address has verified or not. Mail and user id will be taken from auth.
     * @return string
     */
    public function checkEmailVerification()
    {
        $msg = "";
        // refactor : reduntdent code with, code send.
        try {
            $user_id = Utils::getUserId();
            $user_mail = Utils::getLoggerEmailId();
            $mv = MailVerification::where('user_id', $user_id)->where('user_email', $user_mail)->get()[0];
            if ($mv->status == "1") {
                $msg = "1";
            } else {
                $msg = "0";
            }
        } catch (\Exception $e) {
            error_log("Error in Reding verification status!");
        }
        return $msg;
    }

    // refactor : this method may not needed, can be merged with checkVerification

    /**
     * to chek taht this user, has sent code or not.
     */
    public function checkSendCode()
    {
        $codeSent = "0";
        try {
            $user_id = Utils::getUserId();
            $user_mail = Utils::getLoggerEmailId();
            $mv = MailVerification::where('user_id', $user_id)->where('user_email', $user_mail)->get()[0];
            $codeSent = "1";
        } catch (\Exception $e) {
            $codeSent = "0";
        }
        return $codeSent;
    }

}// class
