<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Applicant extends Authenticatable
{
    use Notifiable;
    
    protected $table = "applicants";
    
    protected $fillable = [

        'username',
        'email',
        'password',
        'full_name',
        'has_answered',
        'title',
        'description',
        'location',
        'resume_pdf',
        'phone',
        'years_of_experience',
        'verified',
        'expertise_id'

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    

    public function answer() 
    {
        return $this->hasMany('App\Answer','id','applicant_id');
    }

    public function field_expertise() 
    {
        return $this->hasOne('App\FieldExpertise','id','expertise_id');
    }
}
