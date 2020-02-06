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
        $this->assertTrue(true);
//        $this->search_basic(10, 'DESC', 'batch', 1, "dept", "C");//done
//        $this->search_basic_count(10, 'DESC', 'batch', 1, "dept", "C");//done

//        $this->search_education(10, 'DESC', 'batch', 1, "institue_name", "%School%");//done
//        $this->search_education_count(10, 'DESC', 'batch', 1, "institue_name", "%School%");//done

//result :  "type", "%pub%" -> 2
//        $this->search_jobs(10, 'DESC', 'batch', 1, "type", "%pub%");//done
//result :  "type", "%pub%" -> 2
        $this->search_jobs_count(10, 'DESC', 'batch', 1, "type", "%pri%");//done


    }

//    start : assertion
//    public function testSearch_basic(){
//        $this->search_basic(10, 'DESC', 'batch', 1, "dept", "C");//done
//    }
//    public function testSearch_basic_count(){
//        $this->search_basic_count(10, 'DESC', 'batch', 1, "dept", "C");//done
//    }
//    end : assertion


    public function search_jobs($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/jobs?page=' . $pageNumber,
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
        $this->assertTrue(($d != null));
        $this->assertTrue(true);
        for ($i = 0; $i < $per_page; $i++) {
            if ($d[$i] == null) {
                break;
            }

            error_log(
                $d[$i]->id
                . ' batch :' . $d[$i]->batch
                . ' uID :' . $d[$i]->user_id
                . " Name : " . $d[$i]->first_name
                . $d[$i]->last_name
                . "---institute Name : " . $d[$i]->organization_name
                . "---Type : " . $d[$i]->type
                . "---Role: " . $d[$i]->role);

        }
    }
    public function search_jobs_count($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/jobs_count?page=' . $pageNumber,
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
        print_r($d);
//        $this->assertTrue(($d != null));
//        $this->assertTrue(true);
    }


    public function search_education($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/education?page=' . $pageNumber,
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
        $this->assertTrue(($d != null));
        $this->assertTrue(true);
        for ($i = 0; $i < $per_page; $i++) {
            if ($d[$i] == null) {
                break;
            }

            error_log(
                $d[$i]->id
                . ' batch :' . $d[$i]->batch
                . ' uID :' . $d[$i]->user_id
                . " Name : " . $d[$i]->first_name
                . $d[$i]->last_name
                . "---institute Name : " . $d[$i]->institue_name
                . "---Passing Year : " . $d[$i]->passing_year);

        }
        //exception not catching error, instead haulting program.
//        error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);
    }
    public function search_education_count($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/education_count?page=' . $pageNumber,
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
        print_r($d);
//        $this->assertTrue(($d != null));
//        $this->assertTrue(true);
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
        $this->assertTrue(($d != null));
        $this->assertTrue(true);
        for ($i = 0; $i < $per_page; $i++) {
            error_log($d[$i]);
        }
        //exception not catching error, instead haulting program.
//        error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        // dd($d);
    }
    public function search_basic_count($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {
        $response = $this->json(
            'POST',
            'search/basic_count?page=' . $pageNumber,
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
//        error_log("count basic search");
        error_log("count basic search : " . $d['status']);
        $this->assertTrue(($d['status'] != null));
    }


//start : have to delete; old code; another class
    public
    function search_count($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
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

    }

    public
    function search($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
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

    public
    function countAll()
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

    public
    function getAll($per_page, $sort_by, $sort_on, $pageNumber)
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

    public
    function getAllEducations()
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

    public
    function getToken($mail, $pass)
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

    public
    function Loggin()
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

    public
    function SignUp()
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
