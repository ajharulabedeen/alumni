<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class F_Event_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);

//        $this->getAllEvents(10, "ASC", "end_date", "1");//passed
//        $this->create();//passed
//        $this->getDescriptionNotes(1);//passed
//        $this->delete(5);//passed
//        $this->update(8);//passed
//        $this->count_all();//passed
//        $this->search_event(10, "ASC", "id", "3", "location", "%Dhaka%");//passed
//        $this->search_event_count("location", "%Dhaka");//passed
//        $this->updateBasicInformation();
//        $this->updateDescriptionNotes();
//        $this->findOne();
//        $this->assingment_payment_event();
//        $this->checkPaymentAssingment();
//        $this->removePaymentAssingment();
//        $this->eventRegistration("818");
//        $this->checkEventRegistration("818", "6");
//        $this->checkPayment("110", "7");
//        $this->getAllRegisteredUser(10,
//            "DESC", "batch",
//            "dept", '%%', "110");

        $this->countSearchRegisteredUser("dept", '%bb%', "110");

    }



    public function countSearchRegisteredUser(
        string $column_name,
        string $key,
        string $event_id)
    {
        $response = $this->json(
            'POST',
            'events/countSearchRegisteredUser',
            [
                "column_name" => $column_name,
                "key" => $key,
                "event_id" => $event_id,
            ]
            ,
            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d['count']);
    }

    public function getAllRegisteredUser(string $per_page,
                                         string $sort_by,
                                         string $sort_on,
                                         string $column_name,
                                         string $key,
                                         string $event_id)
    {
        $response = $this->json(
            'POST',
            'events/getAllRegisteredUser',
            [
                "per_page" => $per_page,
                "sort_by" => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key,
                "event_id" => $event_id,
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
//        error_log($d);
        foreach ($d as $p) {
            error_log($p->user_id);
            print_r($p);
        }
//        dd($d);
    }

    public function checkPayment($event_id, $user_id)
    {
        $response = $this->json(
            'POST',
            'events/checkPayment',
            [
                "event_id" => $event_id,
                "user_id" => $user_id,
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d["status"]);
    }

    public function checkEventRegistration($event_id, $user_id)
    {
        $response = $this->json(
            'POST',
            'events/checkEventRegistration',
            [
                "event_id" => $event_id,
                "user_id" => $user_id,
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d["status"]);
    }

    public function eventRegistration(string $event_id)
    {
        $response = $this->json(
            'POST',
            'events/eventRegistration',
            [
                "event_id" => $event_id,
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d);
    }

    public function removePaymentAssingment()
    {
        $response = $this->json(
            'POST',
            'events/removePaymentAssingment',
            [
                "event_id" => "818",
                "payment_type_id" => "20",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d);
//        dd($d);
    }


    public function checkPaymentAssingment()
    {
        $response = $this->json(
            'POST',
            'events/checkPaymentAssingment',
            [
                "event_id" => "241",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );
        $d = $response->baseResponse->original;
        error_log($d);
//        dd($d);
    }

    public function assingment_payment_event()
    {
        $response = $this->json(
            'POST',
            'events/assingment_payment_event',
            [
                "event_id" => "7",
                "payment_type_id" => "20",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );


        $d = $response->baseResponse->original;
//        error_log($d['description']);
        dd($d);
    }

    public function findOne()
    {
        $response = $this->json(
            'POST',
            'events/find_one',
            [
                "id" => "1",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
//        error_log($d['description']);
        dd($d);
    }

    public function updateDescriptionNotes()
    {
        $response = $this->json(
            'POST',
            'events/update_description_notes',
            [
                "id" => "1",
                "description" => "LA LA",
                "notes" => "DiM DiM",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function updateBasicInformation()
    {
        $response = $this->json(
            'POST',
            'events/update_basic',
            [
                "id" => "1",
                "title" => "MeetUp 2041",
                "start_date" => "2019/04/04",
                "end_date" => "2019/04/05",
                "fee" => "500",
                "location" => "Green Garden",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function search_event_count($column_name, $key)
    {
        $response = $this->json(
            'POST',
            'events/search_event_count',
            [
                "column_name" => $column_name,
                "key" => $key
            ]
//            ,
//            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
//            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function search_event($per_page, $sort_by, $sort_on, $pageNumber, $column_name, $key)
    {

        $response = $this->json(
            'POST',
            'events/search_event?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key
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
        if ($d != null) {
            for ($i = 0; $i < $per_page; $i++) {
                if ($d[$i] == null) {
                    break;
                }
                error_log($d[$i]);
//                error_log(
//                    $d[$i]->id
//                    . ' Title :' . $d[$i]->title
//                    . ' sDate :' . $d[$i]->start_date
//                    . " eDate : " . $d[$i]->end_date
//                    . " fee : " . $d[$i]->fee);
            }
        }

    }

    public function count_all()
    {
        $response = $this->json(
            'POST',
            'events/count_all',
            []
//            ,
//            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
//            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function update($id)
    {
        $response = $this->json(
            'POST',
            'events/update',
            [
                "id" => $id,
                "title" => "MeetUp 2041",
                "start_date" => "2019/04/04",
                "end_date" => "2019/04/05",
                "fee" => "500.55",
                "location" => "Green Garden",
                "description" => "We all the previous student will meet at this day!",
                "notes" => "Please Dont Miss it!",
                "images" => "No Image Available!",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function delete($id)
    {
        $response = $this->json(
            'POST',
            'events/delete',
            [
                'id' => $id
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function getDescriptionNotes($id)
    {
        $response = $this->json(
            'POST',
            'events/getDescriptionNotes',
            [
                'id' => $id
            ]
        // ,
        // [
        //     "HTTP_AUTHORIZATION" => "bearer" .  $this->getToken("u1@umail.com", "123456")
        // ]
        );

        $d = $response->baseResponse->original;
        error_log('Description : ' . $d['description']);
        error_log('Notes : ' . $d['notes']);
//        dd($d);
    }

    public function create()
    {
        $response = $this->json(
            'POST',
            'events/create',
            [
                "title" => "MeetUp 2041",
                "start_date" => "2019/04/04",
                "end_date" => "2019/04/05",
                "fee" => "500",
                "location" => "Green Garden",
                "description" => "We all the previous student will meet at this day!",
                "notes" => "Please Dont Miss it!",
                "images" => "No Image Available!",
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u2@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function getAllEvents($per_page, $sort_by, $sort_on, $pageNumber)
    {
        $response = $this->json(
            'POST',
            'events/getAllEvents?page=' . $pageNumber,
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
//        dd($d);
        $this->assertTrue(($d != null));
        $this->assertTrue(true);
        if ($d != null) {
            for ($i = 0; $i < $per_page; $i++) {
                if ($d[$i] == null) {
                    break;
                }
                error_log($d[$i]);
//                error_log(
//                    $d[$i]->id
//                    . ' Title :' . $d[$i]->title
//                    . ' sDate :' . $d[$i]->start_date
//                    . " eDate : " . $d[$i]->end_date
//                    . " fee : " . $d[$i]->fee);
            }
        }
    }

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
