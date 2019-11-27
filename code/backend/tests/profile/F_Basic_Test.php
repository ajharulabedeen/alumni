<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class F_Basic_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //working
        // $response = $this->get('/basic/create');
        // $response->assertStatus(200);
        // error_log($response->original);
        // dd($response);

        //both will not work together.
        // $this->Loggin();
        // $this->SignUp();
        // -----------------------------------
        // $this->creation();
        // $this->findOneByUserID();
        $this->update();
    }

    public function findOneByUserID()
    {
        // $response = new ProfileBasic();

        $response = $this->json(
            'POST',
            // '/basic/findOneById',
            'api/basic/findOneById',
            [
                'user_id' => '4', //have to send 4
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        // dd($response->exception);

        error_log("Error : ");
        // error_log("id :" .  $response->original['id']);
        // error_log( "user_id : " . $response->original['user_id']);
        // error_log("dept : " . $response->original['dept']);
        // $this->assertEquals('2', $response->original['user_id']);
        // dd($response->baseResponse);
        dd($d);
    }

    //passed
    public function update()
    {
        $dept = "EM";
        $response = $this->json(
            'POST',
            '/basic/update',
            [
                // 'user_id' => '2',
                'dept' => $dept,
                'batch' => '130102096',
                'student_id' => '130102096',
                'first_name' => 'Real Name',
                'last_name' => "'Khan'",
                'birth_date' => '13-01-2096',
                // 'gender' => 'Other',
                // 'blood_group' => 'A+',
                // 'email' => 'dimdim@gmail.com',
                // 'phone' => '01717-111000',
                'research_interest' => 'Electro Medicene',
                // 'skills' => 'Laracast',
                // 'image_address' => 'URL',
                'religion' => 'Other'
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
                "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            ]
        );
        // $d = $response->baseResponse->original;
        $d = $response->exception;
        // error_log("Response : " . $d);
        // dd($d->exception);
        // $this->assertEquals('1', $d);
        dd($d);
        // --------confirm Update----------
        $response = $this->json(
            'POST',
            '/basic/findOneById',
            [
                'user_id' => '2',
            ]
        );
        $d = $response->baseResponse->original;
        error_log("After : " . $response->original['dept']);
        $this->assertEquals($dept, $response->original['dept']);
    }


    public function creation()
    {
        $response = $this->json(
            'POST',
            // '/basic/create',
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
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
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
