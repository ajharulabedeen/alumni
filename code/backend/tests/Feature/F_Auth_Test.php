<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
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
        $this->me();
        // $this->SignUp();
    }

    public function me(){
        $response = $this->json(
            'POST',
            '/api/me',
            [],
            [
                "HTTP_AUTHORIZATION" => "bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1NzMyODg2MTEsImV4cCI6MTU3MzI5MjIxMSwibmJmIjoxNTczMjg4NjExLCJqdGkiOiJJZHRpQ2JGcXg4eG5WQXZuIiwic3ViIjo2LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.y_472J3YaNKkgcEtk1GqhIVU26EQ80Xyc7O8USLhfyE"
            ]
        );
        // dd($response);
        // dd($response->exception);
        $d = $response->baseResponse->original;
        // $s = $this->transformHeadersToServerVars([ 'Authorization' => $d['access_token'] ]);
        // error_log($s);
        // error_log($d['access_token']);

        // dd($s);
        dd($d->email);
        // dd($d->name);
    }

    public function Loggin()
    {
        $response = $this->json(
            'POST',
            '/api/login',
            [
                'email' => 'louiugir@uttmail.com',
                'password' => '123456'
            ]
        );
        // dd($response->exception);
        $d = $response->baseResponse->original;
        $s = $this->transformHeadersToServerVars([ 'Authorization' => $d['access_token'] ]);
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
                'email' => 'louiugicar@uttmail.com',
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
