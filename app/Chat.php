<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function user(){
        $this->belongsTo(User::class);
    }
}
