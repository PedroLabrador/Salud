<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function applies() {
        return $this->belongsToMany(User::class);
    }

    public function hasApplied(User $user) {
        return $this->applies->contains($user);
    }
}
