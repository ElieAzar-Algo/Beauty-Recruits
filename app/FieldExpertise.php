<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldExpertise extends Model
{
    protected $table = "fields_expertises";
    protected $fillable = [

        'expertise_name',
    ];
}
