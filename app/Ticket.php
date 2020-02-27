<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'ticket_user','ticket_id','id');
    }
    protected $primaryKey = 'ticket_id';
    public $timestamps = false;
}
