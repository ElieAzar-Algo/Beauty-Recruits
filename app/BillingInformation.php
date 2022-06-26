<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    //
    protected $table = 'billing_information';
    protected $fillable = ['id','firstName','user_subscription_id','lastName','username','country','status','zip'];


}
