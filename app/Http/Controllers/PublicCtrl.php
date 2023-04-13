<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PublicCtrl extends Controller
{

    public function viewPosts(){
        // $data = Post::with('comments')->first();  // This will give you all comments of 1st / Single Post
        // $data = Post::with('comments')->get(); // This will give you all the comments of 1st Post along with all Post Detail
        $data = Post::find(1)->comments; // This will give you all the comments of the Post number that you Passed i.e 1st Post (use it as a property)
        // return $data->comments; // this will work only with ->first() method on Eloquent ORM not with ->get()
        return $data;
    }

    public function viewComments(){
        // $data = Comment::with('posts')->first();
        $data = Comment::with('posts')->get();
        // $data = Comment::find(1);
        // return $data->posts; // this will work only with ->first() method on Eloquent ORM not with ->get()
        return $data;
        // dd($data->toArray());
    }
}
