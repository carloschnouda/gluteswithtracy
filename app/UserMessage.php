<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserMessage extends Model 
{
	

    protected $table = 'user_messages';

    protected $guarded = ['id'];

    

	public function user() { return $this->belongsTo('App\User'); } 

    /* Start custom functions */



    /* End custom functions */
}