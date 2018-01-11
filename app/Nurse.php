<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'address' => '',
        'phone' => '',
    ];
}
