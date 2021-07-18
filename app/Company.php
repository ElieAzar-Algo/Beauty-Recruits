<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Company extends Authenticatable
{
    use Notifiable;

    protected $table = "companies";
    
    protected $fillable = [

        'username',
        'email',
        'password',
        'name',
        'introduction',
        'location',
        'phone',
        'website',
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

    public function company_document() 
    {
        return $this->hasMany('App\CompanyDocument','id','company_id');
    }

    // public function field_expertise() 
    // {
    //     return $this->hasMany('App\FieldExpertise','id','company_id');
    // }
}
