<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function __construct()
    {
        \View::share('menu_active', "users");
    }
    public function index()
    {
    	$users = User::paginate(10);

    	return view("admin.users.list",["users"=>$users]);
    }

    public function create()
    {
    	return view("admin.users.create");
    }

    public function save(Request $request)
    {
    	$request->validate([
		    'email' => 'required|unique:users|max:255',
		    'name' => 'required',
		    'password' => 'required|string|min:6|confirmed',
		]);

    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return redirect()->route("users")->with(["message_success"=>"Usuario Creado Exitosamente"]);
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id);
    	return view("admin.users.edit",["user"=>$user]);
    }

    public function update(Request $request)
    {
    	$request->validate([
		    'email' => 'required|max:255|unique:users,id,'.$request->id,
		    'name' => 'required',
		]);
		
    	$user = User::findOrFail($request->id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	if (isset($request->password) && !empty($request->password)) {
    		$request->validate([
		    	'password' => 'string|min:6|confirmed',
			]);
    		$user->password = bcrypt($request->password);

    	}
    	$user->update();

    	return redirect()->route("users")->with(["message_success"=>"Usuario Actualizado Exitosamente"]);
    }

    public function destroy($id)
    {
    	$user = User::findOrFail($id);
    	$user->delete();

    	return redirect()->route("users")->with(["message_success"=>"Usuario Eliminado Exitosamente"]);
    }
}
