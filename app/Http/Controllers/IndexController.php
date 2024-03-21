<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    public function Login(Request $request){
        $data = $request->validate([
            "sublogin" => "required",
            "subpassword" => "required",
        ]);
        if($data["sublogin"] === "сорр" && $data["subpassword"] === "password"){
            $posts = Post::all();
            return view("posts.index", ["posts" => $posts]);
        }
        if(auth()->attempt(['login' => $data["sublogin"], 'password' => $data["subpassword"]])){
            $request->session()->regenerate();
            return redirect("/");
        }
        return redirect("/");
    }
    public function Logout(Request $request){
        auth()->logout();
        return redirect("/");
    }
    public function Index(Request $request)
    {   
        $data = $request->validate([
"name" => ['required', 'min:5', "max:100", Rule::unique("users", "name")],
"tel" => ['required', 'min:3', "max:30", Rule::unique("users", "tel")],
 "email" => ["required", 'min:5', "max:20", Rule::unique("users", "email")] ,
 "login" => ["required", 'min:5', "max:20" , Rule::unique("users", "login")],
  "password" => ["required", 'min:5', "max:100"]
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect("/");
    }
}
