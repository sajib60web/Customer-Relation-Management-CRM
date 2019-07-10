<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerMail extends Model
{
    public function customer_name(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
