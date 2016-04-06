<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
    	$users = \App\User::all();
        return view('users', ['users' => $users]);

    }

    public function details($id) {
    	$user = \App\User::find($id);
        $entries = $user->fileentries;

        //var_dump($user->name);

        return view('userdetail', ['user' => $user], ['entries' => $entries]);
    }
}
