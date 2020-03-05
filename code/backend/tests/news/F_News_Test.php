<?php

namespace Tests\Feature;

use App\news\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestUtil;

class F_News_Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);
//        $this->save();//passed
//        $this->delete(298);// this id no more valid.
//        $this->update(298);//passed
//        $this->findOne(303);//passed
//        $this->getAllNews("10", "ASC", "id", "10");
//        $this->countAll();
//        $this->search("10", "ASC", "user_id", "title", "PHP", "1");
        $this->search_count("title", "");
    }

    public function search_count($column_name, $key)
    {
        $response = $this->json(
            'POST',
            'news/search_count',
            [
                "column_name" => $column_name,
                "key" => $key
            ]
            ,
            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function search($per_page, $sort_by, $sort_on, $column_name, $key, $pageNumber)
    {
        $response = $this->json(
            'POST',
            'news/search?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
                "column_name" => $column_name,
                "key" => $key
            ]
            ,
            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
//        dd($d);
        foreach ($d as $x => $k) {
            error_log($k);
        }
    }

    public function countAll()
    {
        $response = $this->json(
            'POST',
            'news/countAll',
            []
            ,
            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function getAllNews($per_page, $sort_by, $sort_on, $pageNumber)
    {
        $response = $this->json(
            'POST',
            'news/getAllNews?page=' . $pageNumber,
            [
                'per_page' => $per_page,
                'sort_by' => $sort_by,
                "sort_on" => $sort_on,
//                "column_name" => $column_name,
//                "key" => $key
            ]
            ,
            [
//                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
//        dd($d);
        foreach ($d as $x => $k) {
            error_log($k);
        }
    }

    public function findOne(string $id)
    {

        $response = $this->json(
            'POST',
            'news/findOne',
            [
                'id' => $id
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        error_log($d);
//        dd($d);
    }

    public function update()
    {
        $response = $this->json(
            'POST',
            'news/update',
            [
                "id" => "303",
                "title" => "MeetUp 2041 completion!",
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

//        [
//            "title" => "MeetUp 2041 completion!",
//            "description" => "We all the previous student will meet at this day!",
//            "notes" => "Please Dont Miss it!",
//            "images" => "No Image Available!",
//        ]
//        $news = new News();
//        $news->user_id = "10";
//        $news->title = "Alumni Ready!";
//        $news->description = "Test News! Alumni Project is Ready!";
//        $news->notes = "Test News!";
//        $news->post_date = date("Y-m-d h:i:s");

    }

    public function delete($id)
    {
        $response = $this->json(
            'POST',
            'news/delete',
            [
                'id' => $id
            ]
            ,
            [
                "HTTP_AUTHORIZATION" => "bearer" . $this->getToken("u1@umail.com", "123456")
            ]
        );

        $d = $response->baseResponse->original;
        dd($d);
    }

    public function save()
    {
        $response = $this->json(
            'POST',
            'news/save',
            [
                "user_id" => "10",
                "title" => "MeetUp 2041 completion!",
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


//    old code

    public function countSearchRegisteredUser(string $column_name, string $key, string $event_id)
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
