<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class F_Administrator_Test extends TestCase
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
//        $this->save();
//        $this->findOne();
//        $this->getAll();
        $this->update();


    }

    public function update()
    {
        $response = $this->json(
            'POST',
            'administrator/update',
            [
                'id' => '4',
                'title' => "AGS",
                'description' => "Head of All activity, valid for 2 years!",
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }


    public function getAll()
    {
        $response = $this->json(
            'POST',
            'administrator/getAll',
            [],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        error_log($d);
        print_r($d);
        error_log("Error : ");
        // dd($response->exception);

//        dd($d);
    }

    public function findOne()
    {
        $response = $this->json(
            'POST',
            'administrator/findOne',
            [
                'id' => "1",
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        error_log($d);
        error_log("Error : ");
        // dd($response->exception);

//        dd($d);
    }

    public function save()
    {
        $response = $this->json(
            'POST',
            'administrator/save',
            [
                'title' => "President",
                'description' => "Head of All activity, valid for 2 years!",
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }


//    old code ----
    //done.
    public function findOneByUserID()
    {
        // $response = new ProfileBasic();

        $response = $this->json(
            'POST',
            // '/basic/findOneById',
            'api/about/getAboutByUserId', [],
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
                //error : Error: Using $this when not in object context
                // "HTTP_AUTHORIZATION" => "bearer" .  TestUtil::getToken("u1@umail.com", "123456")
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

    //test done.
    public function creation()
    {
        $response = $this->json(
            'POST',
            'about/create',
            [
                // 'user_id' => '2',
                'about_me' => 'CSE-------',
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
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