<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";
    protected $fillable = [

        'company_id',
        'job_title',
        'salary',
        'job_description',
        'years_of_experience',
        'time_frame',
        'date_posted',
        'question',
        'expertise_id'

    ];

    public function company() 
    {
        return $this->belongsTo('App\Company','company_id','id');
    }

    // public function field_expertise() 
    // {
    //     return $this->hasOne('App\FieldExpertise','expertise_id','id');
    // }
}
