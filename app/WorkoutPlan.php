<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class WorkoutPlan extends Model
{


    protected $table = 'workout_plans';

    protected $guarded = ['id'];



    public function categories()
    {
        return $this->belongsToMany('App\WorkoutCategory', 'category_workout_plan', 'workout_plan_id', 'workout_category_id')->orderBy('category_workout_plan.ht_pos');
    }

    /* Start custom functions */



    /* End custom functions */
}
