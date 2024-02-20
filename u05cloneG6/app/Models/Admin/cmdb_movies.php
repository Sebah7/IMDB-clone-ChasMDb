<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_movies extends Model
{
    use HasFactory;

    protected $table = 'cmdb_movies';
    protected $fillable = ['title', 'genre', 'actor', 'director'];


    // alla models som har en relation till varandra ska även ha en funktion i sina respektive filer
=======


    public function actors()
    {
        return $this->belongsToMany(cmdb_actors::class, 'cmdb_movies_genre_table_pivot', 'movie_id', 'actor_id');
    }

    public function genre()
    {
        return $this->belongsToMany(cmdb_genre::class, 'cmdb_movies_genre_table_pivot', 'movie_id', 'genre_id');
    }

    public function watchlists()
    {
        return $this->belongsToMany(cmdb_watchlist::class, 'cmdb_watchlist_movie_pivot', 'movie_id', 'watchlist_id');
    }

    public function directors()
    {
        return $this->belongsToMany(cmdb_director::class, 'cmdb_director_movie_pivot', 'movie_id', 'director_id');
    }
=======

}

    // public function directors()
    // {
    //     return $this->belongsToMany(cmdb_director::class, 'cmdb_watchlist_movie_pivot', 'movie_id', 'director_id');

    // } CREATE A PIVOT TABLE