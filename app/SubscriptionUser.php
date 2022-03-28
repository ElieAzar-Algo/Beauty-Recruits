<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionUser extends Model
{
    //
    protected $table = 'user_subscription';
    protected $fillable = ['id','user_id','subscription_id','end_date'];
}
