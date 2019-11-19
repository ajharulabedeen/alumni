<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class F_Jobs_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //both will not work together.
        // $this->Loggin();
        // $this->SignUp();
        // -----------------------------------
        $this->creation();
        // $this->update();
        // $this->getAllEducations();
        // $this->delete();
    }

    public function delete()
    {
        $response = $this->json(
            'POST',
            'api/education/deleteOne',
            [
                'id' => '10004'
            ],
            [
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    public function getAllEducations()
    {
        $response = $this->json(
            'POST',
            'api/education/getAllEducationsByUserId',
            [],
            [
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    public function update()
    {
        $response = $this->json(
            'POST',
            'api/education/update',
            [
                'id' => '10003',
                'degree_name' => 'HSC',
                'institue_name' => 'Shapur Madhugram Collage',
                'passing_year' => '2012',
                'result' => '4.19'
            ],
            [
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);


        // --------confirm Update----------
        // $response = $this->json(
        //     'POST',
        //     '/basic/findOneById',
        //     [
        //         'user_id' => '2',
        //     ]
        // );
        // $d = $response->baseResponse->original;
        // error_log("After : " . $response->original['dept']);
        // $this->assertEquals($dept, $response->original['dept']);
    }

    //done.
    public function creation()
    {
        $response = $this->json(
            'POST',
            'api/jobs/create',
            [
                'organization_name' => 'ISTL',
                'type' => 'Private',
                'role' => 'Software Engineer',
                'started' => '2018',
                'leave' => '2019',
                'current_status' => 'Leave',
            ],
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        // $d = $response->exception;
        //exception not catching error,instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    public function getToken($mail, $pass)
    {
        $response = $this->json(
            'POST',
            '/api/login',
            [
                'email' => $mail,
                'password' => $pass
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d['access_token']);
    }

    // thses method kept to use when feature test with auth will be done.
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
        dd($d);

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
