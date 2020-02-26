<?php

namespace App\Mail;

use App\Utils\Utils;

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
}