<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        error_log(" MAIL :> ");
        error_log(" MAIL : " . __CLASS__);
        try {
            Mail::send('pass', ['text' => 'mail'], function ($message) {
                $message->to('cse1301096@gmail.com', 'To Bitfumes')->subject('Test Mail');
                $message->from('gub.cse.files@gmail.com', 'AlumniLTE');
            });
            error_log("\n Mail Send Success : "  . __CLASS__);
        } catch (\Throwable $th) {
            error_log("ERROR in SENDING MAIL!");
        }
    }

    /**
     * this is to verify the email address.
     */
    public function sendVerificationCode()
    {

    }

    public function checkVerificationCode()
    {

    }


}// class
