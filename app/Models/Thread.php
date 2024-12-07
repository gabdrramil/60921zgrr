<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;
    public function comments(): HasMany
    {
        return  $this->hasMany(Comment::class);
    }
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_thread');
    }
}
