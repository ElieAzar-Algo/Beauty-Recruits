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
}
