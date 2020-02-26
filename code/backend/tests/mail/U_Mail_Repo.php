<?php

namespace Tests\Unit\profile;


use Tests\TestCase;
use App\Mail\Mail_Repo;


class U_Mail_Repo extends TestCase
{

    /**
     * Mother test
     * This method will w$ork as mother test method.
     * all other test method will be called from here.
     * So test skip can be easily achived.
     *
     */
    public function testMain()
    {
        echo "\n >----------- Test Main : ---------> \n";
        error_log("Search :");
        $this->getRandomNumber();
    } //main test

    public function getRandomNumber()
    {
        $mailRepo = new Mail_Repo();
        error_log($mailRepo->getRandomNumber());
    }
}//class
