<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send()
    {
        error_log(" MAIL :> ");
        error_log(" MAIL : " . __CLASS__);
    }
}
