<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ShowSinglePost(Post $post){

        $markdown = strip_tags(Str::markdown($post->body), '<p><ul><li><strong><em><h3><br>');
        $post['body'] = $markdown;
        return view('single-post', ['post' => $post]);

    }

    public function ShowCreateForm(){
        return view('create_post');
    }

    public function SaveForm(Request $request){

        $data = $request->validate([
            'title'=> 'required',
            'body'=> 'required'
        ]);


        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = auth()->id();


        $newpost = Post::create($data);

        return redirect("/post/{$newpost->id}")->with('success', 'new post successfully created');
    }
}
