<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;

class cmdb_director extends Model
{
    protected $table = 'cmdb_directors';
    protected $fillable = ['name'];

    public function directorMovieRelation() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_director_movie_table_pivot', 'director_id', 'movie_id');
    }
    
}
