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
        //both will not work together.
        // $this->Loggin();
        // $this->SignUp();
        // -----------------------------------
        //1
        // $this->creation(); //done
        //2
        // $this->update();//done
        //3
        // $this->delete(8);//done
        //4
        // $this->findOne(7); //done
        //5
        // $this->getAll(5, 'ASC', 'last_date', 3); //done
        //6
        // $this->countAll(); //done
    }

    //1
    //done
    public function creation()
    {
        $response = $this->json(
            'POST',
            'paymentType/create',
            [
                'name' => 'March-19 Fee',
                'start_date' => '01-01-2019',
                'last_date' => '31-12-2019',
                'description' => 'Please pay the FEE!',
                'amount' => '500',
            ]
            // ,
            // [
            //     "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            // ]
        );
        $d = $response->baseResponse->original;
        // $d = $response->exception;
        //exception not catching error,instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);
        dd($d);
    }

    //2
    //done
    public function update()
    {
        $response = $this->json(
            'POST',
            'paymentType/update',
            [
                'id' => '7',
                'name' => 'March-19 Fee',
                'start_date' => '01-01-2019',
                'last_date' => '31-12-2019',
                'description' => ' Update : Please pay the FEE!',
                'amount' => '500',
            ]
            // ,
            // [
            //     "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            // ]
        );
        $d = $response->baseResponse->original;
        // $d = $response->exception;
        //exception not catching error,instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    //3
    //done
    public function delete($id)
    {
        $response = $this->json(
            'POST',
            'paymentType/delete',
            [
                'id' => $id
            ]
            // ,
            // [
            //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            // ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    //4
    //done
    public function findOne($id)
    {
        $response = $this->json(
            'POST',
            'paymentType/findOnePaymentType',
            [
                'id' => $id
            ]
            // ,
            // [
            //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
            // ]
        );
        $d = $response->baseResponse->original;
        //exception not catching error, instead haulting program.
        // error_log($d);
        error_log("Error : ");
        // dd($response->exception);

        dd($d);
    }

    //5
    //passed
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

    //6
    /**
     * total number of payment type will be returned.
     */
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
        dd($d);
    }



    // ---------------------------------------------
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
}//class
