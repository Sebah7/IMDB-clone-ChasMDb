<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Eloquent\SoftDeletes;

class cmdb_director extends Model
{
    // the soft delete is goint to delte the data from the view but sill keep it in the database.
    use SoftDeletes;
    protected $table = 'cmdb_directors';
    protected $fillable = ['director_name'];

    public function directorMovieRelation() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_director_cmdb_movie', 'director_id', 'movie_id');
    }
    
}
