<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_watchlist extends Model
{
    

   

    public function watchlistMovieRelation()

    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_watchlist_movie_pivot', 'watchlist_id', 'movie_id');
    }
}