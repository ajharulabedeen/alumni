<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send()
    {
        try {
//            Mail::send('welcome', ['text' => 'mail'], function ($message) {
            Mail::send('pass', ['text' => 'mail'], function ($message) {
                $message->to('cse1301096@gmail.com', 'To Bitfumes')->subject('Test Mail');
                $message->from('gub.cse.files@gmail.com', 'Bitfumes');
            });
            error_log("Mail Send Success!");
        } catch (\Exception $e) {
            error_log("Mail Sending Failed!");
        }

    }
}
