<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentsController extends Controller
{
    public function save(Request $request)
    {
    	$comment = new Comments();
    	$comment->user_id = \Auth::id();
    	$comment->post_id = $request->post_id;
    	$comment->body = $request->body;
    	$comment->save();

    	return redirect()->back()->with(["message_success"=>"Tu Comentario se ha publicado exitosamente"]);


    }
}
