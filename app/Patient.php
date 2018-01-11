<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'address' => '',
        'phone' => '',
    ];
}
