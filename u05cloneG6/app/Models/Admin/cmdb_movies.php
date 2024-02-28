<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
/**
 * Importing the required classes to use the relationships
 */
use App\Models\Admin\cmdb_actors;
use App\Models\Admin\cmdb_genre;
use App\Models\Admin\cmdb_watchlist;
use App\Models\Admin\cmdb_director;
use App\Models\Admin\cmdb_reviews;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class cmdb_movies extends Model
{

    /**
     * 'cmdb_movies' is table associated with the model.
     * 'fillable' has the columns that are going to be filled data.
     */
   
     /**
      * Removed the genre because it is stored in the pivot.
      *the soft delete is goint to delte the data from the view but sill keep it in the database.
      */ 
      use SoftDeletes;
    protected $table = 'cmdb_movies';
    protected $fillable = ['title', 'actor', 'director', 'trailer', 'poster', 'runtime', 'language', 'rating', 'description'];


    /**
     * alla models som har en relation till varandra ska även ha en funktion i sina respektive filer
     * BelongsToMany is used when there are many to many relationships. Pivot table is used when connecting the tabels to eachother in this case.
     * HasMany is used when there are one to many relationships. No pivot table is used in this case.
     */

    public function actors() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_actors::class, 'cmdb_actor_cmdb_movie', 'movie_id', 'actor_id');
    }

    public function genres()  : BelongsToMany
{
    return $this->belongsToMany(cmdb_genre::class, 'cmdb_genre_cmdb_movie', 'movie_id', 'genre_id');
}

    public function watchlists() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_watchlist::class, 'cmdb_movie_cmdb_watchlist', 'movie_id', 'watchlist_id');
    }

    public function directors() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_director::class, 'cmdb_director_cmdb_movie', 'movie_id', 'director_id');
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(cmdb_reviews::class, 'movie_id');
    }
}