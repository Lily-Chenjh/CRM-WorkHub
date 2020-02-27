<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use AUTH;
use App\Order;
use App\Mail\contract;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use \App\User;
use \App\Ticket;
use \App\Client;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    //needs work 04 march
    public function create()
    {
        //gathers information from users from db to fill create table with dropdown options        
        $users = \App\User::all();
        $clients = \App\Client::all();
        
        return view ('admin.ticket.admin_create',['clients' => $clients], ['users' => $users]);

        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //create a new ticket 
        $ticket = new Ticket;
        //requests user input from ticket form, save to DB as a new ticket
        $ticket->organisation_name = $request['organisation_name'];
        $ticket->postal_address = $request['postal_address'];
        $ticket->physical_address = $request['physical_address'];
        $ticket->description_brief = $request['description'];
        // $ticket->hours_dedicated = $request['hours'];
        $ticket->commencement_date = $request['start_date'];
        $ticket->due_date = $request['due_date'];
        $ticket->client_id = $request['client_id'];
        $ticket->save();
        
        return redirect('admin/dashboard');

        // echo "<script>
        // alert('A new Ticket for organisation_name has been Created');
        // window.location.href='/admin/dashboard';  
        // </script>";
        
        

        //THIS SECTION HAS BEEN COMMENTED OUT BECAUSE BLOCKED PORTS WILL THROW ERRORS FOR MAILTRAP. ONCE PORTS HAVE BEEN UNBLOCKED, UNCOMMENT CODE AND IT WILL RUN.
        //TO CHECK IF IT WORKS USE THIS LOGIN FOR MAILTRAP https://mailtrap.io/ 
        // username/email: ucolworkhub@gmail.com // password: Theworkhub1

                                        //creates new variables indentical to the the ones stored in the database because once stored in the database, they cannot be called upon again
                                        // $organisation_name2 = $organisation_name;
                                        // $postal_address2 = $postal_address;
                                        // $client_name2 = $client_name;
                                        // $physical_address2 = $physical_address;
                                        // $client_name2 = $client_name;
                                        // $client_position2 = $client_position;
                                        // $client_email2 = $client_email;
                                        // $client_phone2 = $client_phone;
                                        // $description_brief2 = $description_brief;
                                        // $assigned_studenta = $assigned_student;
                                        // $assigned_student_2a = $assigned_student_2;
                                        // $assigned_student_3a = $assigned_student_3;
                                        // $commencement_date2 =  $commencement_date;
                                        // $hours_dedicated2 = $hours_dedicated;
                                        // $due_date2 = $due_date;

                                        // //creates an array called '$data' which includes all the variables, then sends an email using the emails.email view and sends the array data to the view.
                                        // $data = array('organisation_name'=>$organisation_name2, 'postal_address'=>$postal_address2, 'client_name'=>$client_name, 'physical_address'=>$physical_address2, 'client_name'=>$client_name2, 'client_position'=>$client_position2, 'client_email'=>$client_email2, 'client_phone'=>$client_phone2, 'description_brief'=>$description_brief2, 'assigned_student'=>$assigned_student_2, 'assigned_student_2'=>$assigned_student_2a, 'assigned_student_3'=>$assigned_student_3a, 'hours_dedicated'=>$hours_dedicated2, 'commencement_date'=>$commencement_date2, 'due_date'=>$due_date2);
                                        // Mail::send('emails.email', $data, function($message)
                                        // {   
                                        //    $message->to('reubenkir@gmail.com', 'John Smith')
                                        //         ->subject('Welcome!');
                                        //});


                                                                     
    }  

    //alerts admin ticket has been created and reloads dashboard
    

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
    }

    //NEEDS WORK
    //
    //
    public function info($slug)
    {
        // $jobinfo = \App\Ticket::with('Client')->get();
        //uses $slug to get id from ticket and pass to end of URL so form is loaded with only ticket data based on id
        $tickets = \App\Ticket::with('users')->where('ticket_id','=',$slug)->get();

        //add user modal
        //find ticket id
        $ticket = Ticket::findOrFail($slug);
       
        $selected_users = $ticket->users()->pluck('users.id')->toArray();
        $users = User::whereNotIn('id', $selected_users)->get();

       
    
    
        return view('admin.ticket.admin_info', ['tickets' => $tickets],['users'=>$users]);
    }

 
  
}

