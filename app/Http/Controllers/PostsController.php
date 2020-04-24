<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    public function __construct()
    {
        \View::share('menu_active', "posts");
    }

    public function view($id)
    {
    	$post = Posts::findOrFail($id);

    	return view("view_post",["post"=>$post,'menu_active', null]);
    }

    public function index()
    {
    	$posts = Posts::paginate(10);

    	return view("admin.posts.list",["posts"=>$posts]);
    }

    public function create()
    {
    	return view("admin.posts.create");
    }

    public function save(Request $request)
    {
    	$request->validate([
		    'title' => 'required|max:255',
		    'body' => 'required',
		]);

    	$post = new Posts();
    	$post->title = $request->title;
    	$post->body = $request->body;
    	$post->user_id = \Auth::id();
    	$post->save();

    	return redirect()->route("posts")->with(["message_success"=>"Publicación Registrada Exitosamente"]);
    }

    public function edit($id)
    {
    	$post = Posts::findOrFail($id);

    	return view("admin.posts.edit",["post"=>$post]);
    }

    public function update(Request $request)
    {
    	$request->validate([
		    'title' => 'required|max:255',
		    'body' => 'required',
		]);

    	$post = Posts::findOrFail($request->id);
    	$post->title = $request->title;
    	$post->body = $request->body;
    	$post->user_id = \Auth::id();
    	$post->save();

    	return redirect()->route("posts")->with(["message_success"=>"Publicación Actualizada Exitosamente"]);
    }

    public function destroy($id)
    {
    	$user = Posts::findOrFail($id);
    	$user->delete();

    	return redirect()->route("posts")->with(["message_success"=>"Publicación Eliminada Exitosamente"]);
    }
}
