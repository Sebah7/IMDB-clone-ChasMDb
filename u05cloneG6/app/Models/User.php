<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\cmdb_movies;
use App\Models\Admin\cmdb_watchlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * // The property tag is used to define the relationship
 * between the User model and the cmdb_movies and cmdb_watchlist models.
 * @property cmdb_watchlist $userwatchlist
 * This is to stop the screaming line in watchlist controller. Still screaming but working.
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_movie_cmdb_watchlist', 'watchlist_id', 'movie_id');
    }

    // One User can have one watchlist
    public function userwatchlist()
    {
        return $this->hasOne(cmdb_watchlist::class);
    }
}
