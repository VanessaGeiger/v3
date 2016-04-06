<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index() {
        $entries = \App\Fileentry::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();

        return view('history', ['entries' => $entries]);
    }
}
