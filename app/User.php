<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'status', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function votes() {
        return $this->belongsToMany(User::class, 'votes', 'user_id', 'voted_id');
    }

    public function voted() {
        return $this->belongsToMany(User::class, 'votes', 'voted_id', 'user_id');
    }

    public function hasVoted(User $user) {
        return $this->votes->contains($user);
    }
}
