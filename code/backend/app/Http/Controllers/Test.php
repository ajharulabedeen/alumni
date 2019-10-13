<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function t()
    {
        return "Alhumdulilah...!";
    }
}
