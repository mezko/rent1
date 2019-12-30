<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=DB::table('users')->count();
        $flat=DB::table('flats')->count();
        $blog=DB::table('news')->count();
        $noti_message=DB::table('contactuses')->where('reply',0)->count();
       
        Session::put('noti_message',$noti_message);
     
        return view('home')->with('users',$users)->with('flat',$flat)
        ->with('blog',$blog);
    }

}
