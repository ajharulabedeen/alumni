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
//        $this->update();
//        $this->delete();
//        $this->assign_people("4","22");
//        $this->remove_people("6");
        $this->get_assigned_people("22");


    }

    public function get_assigned_people(string $id)
    {
        $response = $this->json(
            'POST',
            'administrator/get_assigned_people',
            [
                'role_id' => $id,
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        error_log($d);
        foreach ($d as $x => $k) {
            error_log($k->first_name . " " . $k->last_name . " > " . $k->email . " > " . $k->phone);
        }
//        error_log("Error : ");
        // dd($response->exception);
//        dd($d);
    }

    public function remove_people(string $id)
    {
        $response = $this->json(
            'POST',
            'administrator/remove_people',
            [
                'id' => $id,
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
//         error_log($d);
//        error_log("Error : ");
        // dd($response->exception);
//        dd($d);
    }


    public function assign_people(string $user_id, string $role_id)
    {
        $response = $this->json(
            'POST',
            'administrator/assign_people',
            [
                'user_id' => $user_id,
                'role_id' => $role_id,
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

    public function delete()
    {
        $response = $this->json(
            'POST',
            'administrator/delete',
            [
                'id' => "6",
            ],
            [
                // "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
//                "HTTP_AUTHORIZATION" => "bearer" . TestUtil::getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        error_log($d['status']);
        error_log("Error : ");
        // dd($response->exception);
//        dd($d);
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
