<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class cmdb_watchlist extends Model
{
    // the soft delete is goint to delte the data from the view but sill keep it in the database.
    use SoftDeletes;
    protected $fillable = ['user_id', 'movie_id'];
    
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_movie_cmdb_watchlist','movie_id', 'watchlist_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}