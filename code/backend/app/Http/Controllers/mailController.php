<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send()
    {
        Mail::send(['text' => 'mail'], ['name', 'sharthok'], function ($message) {
            $message->to('cse1301096@gmail.com', 'To Bitfumes')->subject('Test Mail');
            $message->from('gub.cse.files@gmail.com', 'Bitfumes');
        });
    }
}
