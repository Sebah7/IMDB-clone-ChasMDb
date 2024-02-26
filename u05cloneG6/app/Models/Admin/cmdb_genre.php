<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;

class cmdb_genre extends Model
{
    protected $table = 'cmdb_genres';
    protected $fillable = ['name'];

    public function moviesGenreRelation() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_movies_genre_table_pivot', 'genre_id', 'movie_id');
    }
}

