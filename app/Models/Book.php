<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'release_date',
        'user_id',
        'user_profile_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userProfile() {
        return $this->belongsTo(UserProfile::class);
    }
}
