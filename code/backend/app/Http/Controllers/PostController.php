<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Post;
class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function create(Request $data)
    {
        $post = new Post();
        $post->title = $data->title;
        $post->user_id = auth()->user()->name;
        $post->title = $data->title;
        $post->description = $data->description;

        // return "Create Post : " . $data->title;
        $post->save();
        return $post;
        // return Post::create([
        //     'id' => "1",
        //     'user_id' => auth()->user()-name,
        //     'title' => $data['title'],
        //     'description' =>$data['description'],]);
    }

    public function edit(){
        return " Edit Post : ";

    }
}
