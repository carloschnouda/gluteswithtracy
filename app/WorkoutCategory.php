<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class WorkoutCategory extends Model 
{
	

    protected $table = 'workout_categories';

    protected $guarded = ['id'];

    

	public function workouts() { return $this->belongsToMany('App\Workout', 'workout_workout_category', 'workout_category_id', 'workout_id')->orderBy('workout_workout_category.ht_pos'); } 

    /* Start custom functions */



    /* End custom functions */
}