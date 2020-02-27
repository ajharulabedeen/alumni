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
//        $this->getRandomNumber();
//        $this->getLoggedUserMail();
//        $this->saveVerificationCode();
//        $this->verification();
//        $this->checkEmailVerification();
//        $this->checkSendCode();
    } //main test

    public function checkSendCode()
    {
        $mailRepo = new Mail_Repo();
        error_log($mailRepo->checkSendCode());
    }

    public function checkEmailVerification()
    {
        $mailRepo = new Mail_Repo();
//        $rand = $this->getRandomNumber();
        error_log($mailRepo->checkEmailVerification());
    }

    public function verification()
    {
        $mailRepo = new Mail_Repo();
        $rand = $this->getRandomNumber();
        $statuss = $mailRepo->verification("990868");
        error_log($statuss);
    }

    public function saveVerificationCode()
    {
        $mailRepo = new Mail_Repo();
        $rand = $this->getRandomNumber();
        $id = $mailRepo->saveVerificationCode($rand);
        error_log($id);
    }

    public function getLoggedUserMail()
    {
        $mailRepo = new Mail_Repo();
        error_log($mailRepo->getLoggedUserMail());
    }

    public function getRandomNumber()
    {
        $mailRepo = new Mail_Repo();
        $rand = $mailRepo->getRandomNumber();
//        error_log($rand);
        return $rand;
    }

}//class
