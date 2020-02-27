<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    protected $primaryKey = 'client_id';
    public $timestamps = false;
}
