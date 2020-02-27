<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use \App\User;
use \App\Ticket;
use App\Ticket_user;


class AdminController extends Controller
{
    Public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //if admin column is set to 1, allow login
            if(auth::attempt(['email'=>$data['email'],'password' =>$data['password'], 'admin' =>'1'])){
                return redirect('/admin/dashboard');
            }
            //if not show popup error and redirect to user login page
            else{
                echo "<script>
                alert('You are not an Admin. You have been redirected to Student Login');
                window.location.href='/login';  
                </script>";
            }
        }
        return view ('admin.admin_login');
    }

    public function dashboard() {

        //gets all user and ticket info
        $users = User::all();
        $tickets = \App\Ticket::all();
        
        return view('admin.admin_dashboard', ['tickets' => $tickets], ['users' => $users]);
    }

    public function users() {

        //gathers all users and admin for admins user view
        $user = Auth::user()->id;
        $users = DB::select("SELECT * FROM users WHERE id <>0");
        $admin = DB::select("SELECT * FROM users WHERE admin =1");
        return view('admin.admin_users', ['users' => $users], ['admin' => $admin]);
    }


 

    public function store(Request $request){

        //gets ticket id from route
        $id = $request->route('slug');
        $user = \App\Ticket::find($id);

        //requests input of an array of user ids from thr checkbox
        $user->users()->attach($request->input(['id'=>'id']));
        //save to DB
        $user->save();

        //back
        return redirect()->back();

    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){

        //finds ticket id
        $remove = \App\Ticket::find($id);
         
        //remove users from ticket based on checked boxes in list
        $remove->users()->detach($request->input('checked'));    
        //after users are removed redirect to previous screen
        return redirect()->back();

    }

}

    

