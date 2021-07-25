<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    protected $table = "job_applicants";
    protected $fillable = [

        'applicant_id',
        'job_id'
    ];
}
