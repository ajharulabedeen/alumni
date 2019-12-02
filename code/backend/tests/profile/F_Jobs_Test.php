<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\profile\Profile_Jobs_Repo_Impl;
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
        // $this->creation(); //done
        // $this->update();//done
        // $this->getAllEducations();//done
        // $this->delete();
        $this->assertEquals(true,true);
    }

    public function testJobFeatureCrud()
    {
        $id = $this->creation();
        $this->assertEquals($id,$this->findOne($id)->id);
    }

    //passed
    public function findOne($id)
    {
        $repoProfileJob =  new Profile_Jobs_Repo_Impl();
        $oneProfileJob = $repoProfileJob->findOne($id);
        error_log($oneProfileJob);
        return $oneProfileJob;
    }

    public function delete()
    {
        $response = $this->json(
            'POST',
            'api/jobs/deleteOne',
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

    //done
    public function getAllEducations()
    {
        $response = $this->json(
            'POST',
            'api/jobs/getAllJobsByUserId',
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

    //done
    public function update()
    {
        $response = $this->json(
            'POST',
            'api/jobs/update',
            [
                'id' => '10006',
                'organization_name' => 'Tiger IT',
                'type' => 'Private/Public',
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
                'organization_name' => 'Tiger IT',
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
        // dd($d);
        return $d;
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
