<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Eloquent\SoftDeletes;

class cmdb_genre extends Model
{
    // the soft delete is goint to delte the data from the view but sill keep it in the database
    use SoftDeletes;

    protected $table = 'cmdb_genres';
    protected $fillable = ['name'];

    public function movies()
{
    return $this->belongsToMany(cmdb_movies::class, 'cmdb_genre_cmdb_movie', 'genre_id', 'movie_id');
}
}

