<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'right_answer',
    ];


    public function answers()
    {
        return $this->hasMany('App\Answer','question_id','id');
    }

}
