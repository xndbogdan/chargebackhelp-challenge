<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['deletable'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'release_date',
    ];

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

    public function getDeletableAttribute() {
        return now()->subDays(2)->lte($this->created_at);
    }
}
