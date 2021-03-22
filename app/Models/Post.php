<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ownedBy(User $user) {
        return $this->user_id === $user->id;
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }
}
