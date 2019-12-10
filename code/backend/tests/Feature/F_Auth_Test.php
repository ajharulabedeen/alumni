<?php

namespace Tests\Feature;

use Tests\TestCase;

class F_Auth_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //working
        // $response = $this->get('/');
        // $response->assertStatus(200);

        //both will not work together.
        // $this->Loggin();
        $this->getToken("u1@umail.com","123456");
        // $this->getToken("mail@g.com","123456");
        // $this->me("mail@g.com", "123456");
        // $this->me("u1@umail.com", "123456");
        // $this->creation();
        // $this->getToken("mail@g.com","123456");
        // $this->SignUp();
    }

    public function creation()
    {
        $response = $this->json(
            'POST',
            'api/basic/create',
            [
                // 'user_id' => '2',
                'dept' => 'CSE',
                'batch' => '130102096',
                'student_id' => '130102096',
                'first_name' => '---',
                'last_name' => "'Khan'",
                'birth_date' => '13-01-2096',
                'gender' => 'Other',
                'blood_group' => 'A+',
                'email' => 'dimdim@gmail.com',
                'phone' => '01717-111000',
                'research_interest' => 'Big Data',
                'skills' => 'Laracast',
                'image_address' => 'URL',
                'religion' => 'ISLAM'
            ],
            [
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        // error_log($d);
        error_log("Error : ");
        dd($response->exception);
        dd($d);
    }


    public function getToken($mail, $pass)
    {
        $response = $this->json(
            'POST',
            '/api/login',
            // 'http://127.0.0.1:8000/api/login',
            [
                'email' => $mail,
                'password' => $pass
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d['access_token']);
    }

    public function me($mail, $pass)
    {
        $response = $this->json(
            'POST',
            '/api/me',
            [],
            [
                // "HTTP_AUTHORIZATION" => "bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1NzMyODg2MTEsImV4cCI6MTU3MzI5MjIxMSwibmJmIjoxNTczMjg4NjExLCJqdGkiOiJJZHRpQ2JGcXg4eG5WQXZuIiwic3ViIjo2LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.y_472J3YaNKkgcEtk1GqhIVU26EQ80Xyc7O8USLhfyE"
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("mail@g.com","123456")
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken($mail, $pass)
            ]
        );
        // dd($response);
        // dd($response->exception);
        $d = $response->baseResponse->original;
        // $s = $this->transformHeadersToServerVars([ 'Authorization' => $d['access_token'] ]);
        // error_log($s);
        // error_log($d['access_token']);

        // dd($d);
        // dd($d->email);
        error_log($d->email);
    }

    public function Loggin()
    {
        $response = $this->json(
            'POST',
            '/api/login',
            [
                'email' => 'u1@umail.com',
                'password' => '123456'
            ]
        );
        // dd($response->exception);
        $d = $response->baseResponse->original;
        $s = $this->transformHeadersToServerVars(['Authorization' => $d['access_token']]);
        // error_log($s);
        error_log($d['access_token']);
        dd($s);
        // dd($d);

        //working
        // error_log(" data : ");
        // error_log(count($d));
        // error_log(" data : " . $d[0]->user);
        // $t = json_decode($d);
        // prettyPrint( $t[0] );
    }


    public function SignUp()
    {
        $response = $this->json(
            'POST',
            '/api/signup',
            [
                'name' => 'Sally',
                'email' => 'louwugicar@uttmail.com',
                'password' => '123456',
                'password_confirmation' => '123456'
            ]
        );
        $response = $this->json(
            'POST',
            '/api/signup',
            [
                'name' => 'Sally',
                'email' => 'ouiugicar@uttmail.com',
                'password' => '123456',
                'password_confirmation' => '123456'
            ]
        );
        $response = $this->json(
            'POST',
            '/api/signup',
            [
                'name' => 'Sally',
                'email' => 'louiugir@uttmail.com',
                'password' => '123456',
                'password_confirmation' => '123456'
            ]
        );
        $d = $response->baseResponse->original;
        dd($d);

        //not working
        // error_log(" data : ");
        // error_log(count($d));
        // error_log(" data : " . $d[0]->user);
        // dd($d);
        // $t = json_decode($d);
        // prettyPrint( $t[0] );
    }
}//class
