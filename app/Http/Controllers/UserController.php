<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {

        $users = User::orderByRaw('lname,fname')->get();

        return view('users.index', ['users'=>$users]);
    }

    public function create() {

        return view('users.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'lname' => $request['lname'],
            'fname' => $request['fname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/users')->with('info', 'A new User has been created.');
    }

    public function edit($id) {
        $user = User::find($id);

        return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id) {

        $user = User::find($id);

        $this->validate($request, [
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required|email',
        ]);
        
        $user->update($request->all());

        return redirect('/users')->with('info', "The record of  $user->lname , $user->fname has been updated.");
    }

    public function destroy(Request $request, $id) {
        $userId = $request['user_id'];

        $user = User::find($userId);
        $name = $user->lname . ", " . $user->fname;

        $user->delete();
        return redirect("/users")->with('info', "The user $name has been deleted");
    }
}
