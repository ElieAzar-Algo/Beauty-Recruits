<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = [

        'applicant_id',
        'job_id',
        'answer',
    ];

    public function applicant() 
    {
        return $this->belongsTo('App\Applicant','applicant_id','id');
    }

    public function job() 
    {
        return $this->belongsTo('App\Job','job_id','id');
    }
}
