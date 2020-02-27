<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use \App\Ticket;
use \App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $id = Auth::user()->id;
    $user = User::find($id);

    //loads tickets for user 
    $tickets = $user->tickets()->get();
       
    return view('home', ['tickets' => $tickets]);
    var_dump($name);
        
    }

    
    public function info($slug)
    {
        //uses $slug to send ticket 1d to URL, and auto fill info form

        $tickets = \App\Ticket::with('users')->where('ticket_id','=',$slug)->get();

        return view('user_info', ['tickets' => $tickets]);
    }

     
    public function forms()
    {
        //loads user form
        $user = Auth::user()->id;
        $users = DB::select("SELECT * FROM users WHERE id=$user");
        return view('user_forms', ['users' => $users]);
    }

}
