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
        // $response = $this->get('/basic/create');
        // $response->assertStatus(200);
        // error_log($response->original);
        // dd($response);

        //both will not work together.
        // $this->Loggin();
        // $this->SignUp();
        $this->creation();
    }


    public function creation()
    {
        $response = $this->json(
            'POST',
            '/basic/create',
            [
                'user_id' => '2',
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
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d);
        error_log("Error : ");
        dd($response->exception);

        // dd($d);
    }

    public function Loggin()
    {
        $response = $this->json(
            'POST',
            '/api/login',
            [
                'email' => 'louiugicar@uttmail.com',
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
