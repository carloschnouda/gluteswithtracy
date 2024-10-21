<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{


    protected $table = 'users';

    protected $guarded = ['id'];


    public $with = ['user_plans'];

    public function user_plans()
    {
        return $this->belongsToMany('App\WorkoutPlan', 'user_plan_user', 'user_id', 'workout_plan_id')->orderBy('user_plan_user.ht_pos');
    }

    /* Start custom functions */



    /* End custom functions */
}
