<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function UpdatePost(Post $post, Request $request){
        if($post->id !== $post["user_id"]){
            return redirect("/");
        }
        $data = $request->validate([
'title' => "required",
'body' => "required",
"status" => "required" 
        ]);
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['status'] = strip_tags($data['status']);
        $post->update($data);
        return view("posts.create-post", ["post" => $post])->with('message', 'Сохранение успешно');
    }
    public function ShowEditScreen(Post $post){
        if($post->id !== $post["user_id"]){
            return redirect("/");
        }
return view("posts.create-post", ["post" => $post]);
    }
    public function ShowEdit(Post $post){
return view('posts.statement', ["post" => $post]);
    }
    public function createPost(Request $request){
$data = $request->validate([
    'title' => 'required', 
    'body' => 'required',
    "file" => 'required',
    "status" => "required"
]);
$data['title'] = strip_tags($data['title']);
$data['body'] = strip_tags($data['body']);
$data['file'] = strip_tags($data['file']);
$data['status'] = strip_tags($data['status']);


$data['user_id'] = auth()->id();
Post::create($data);
return redirect("/");
    }
}
