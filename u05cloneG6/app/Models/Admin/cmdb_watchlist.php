<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;

class cmdb_watchlist extends Model
{
    
    public function watchlistMovieRelation() : BelongsToMany

    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_watchlist_movie_pivot', 'watchlist_id', 'movie_id');
    }
}