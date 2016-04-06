<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $files = \App\Fileentry::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();
        $total_size = $this->human_filesize(\App\Fileentry::where('user_id', Auth::user()->id)->sum('size'));
        $active = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->orderBy('id', 'desc')->count();
        $danger = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->where('expiration','<',Carbon::now()->addWeek())->orderBy('id', 'desc')->count();
        $downloaded = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads','>','0')->orderBy('id', 'desc')->count();

        return view('home',compact('files','total_size','active','danger','downloaded','user'));
    }

    public function human_filesize($bytes, $dec = 2) { 
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'); 
        $factor = floor((strlen($bytes) - 1) / 3); 
        if($factor<2) {
            $dec=0;
        }
        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) ." ". @$size[$factor]; 
    }
}
