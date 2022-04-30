<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantJob extends Model
{
    protected $table = "applicant_job";
    protected $fillable = [

        'applicant_id',
        'job_id'
    ];
    public function applicant()
    {
        return $this->belongsTo(\App\Applicant::class,'applicant_id','id');
    }
    public function job()
    {
        return $this->belongsTo(\App\Job::class,'job_id','id');
    }
}
