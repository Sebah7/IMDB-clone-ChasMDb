<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_director extends Model
{

    protected $tabel = 'cmdb_directors';
    protected $fillable = ['name'];

    public function directorMovieRelation()
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_director_movie_table_pivot', 'director_id', 'movie_id');
    }
    
}
