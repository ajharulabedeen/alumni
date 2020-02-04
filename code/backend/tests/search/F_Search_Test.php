<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class F_PaymentType_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->search_basic(10, 'DESC', 'batch', 1, "dept", "C");//done
//        $this->search_count(5, 'ASC', 'amount', 3, "mobile_number", "02");//done
    }

    public function search_basic($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/basic?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key,
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
//        dd($d);
        for ($i = 0; $i < $per_page; $i++) {
            error_log($d[$i]);
        }
        //exception not catching error, instead haulting program.
        error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);
    }


//start : have to delete; old code; another class
    public function search_count($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'payment/mobile/search_count?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key,
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        //        dd($d);
        for ($i = 0; $i < $per_page; $i++) {
            error_log($d[$i]);
        }
        //exception not catching error, instead haulting program.
        error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);
    }

    public function search($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'payment/mobile/search?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key,
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        //        dd($d);
        for ($i = 0; $i < $per_page; $i++) {
            error_log($d[$i]);
        }
        //exception not catching error, instead haulting program.
        error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);
    }

    public function countAll()
    {
        $response = $this->json(
            'POST',
            'paymentType/countPaymentType',
            []
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        error_log($d['status']);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);

    }

    public function getAll($per_page, $sort_by, $sort_on, $pageNumber)
    {
        $response = $this->json(
            'POST',
            'paymentType/getAllPaymentType?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        for ($i = 0; $i < $per_page; $i++) {
            error_log($d[$i]->last_date);
        }
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        // dd($d);
    }

    public function getAllEducations()
    {
        $response = $this->json(
            'POST',
            'api/jobs/getAllJobsByUserId',
            [],
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }
//end : have to delete; old code; another class

    // thses method kept to use when feature test with auth will be done.

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
