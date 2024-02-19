<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_genre extends Model
{
    // use HasFactory;
    protected $tabel = 'cmdb_genres';
    protected $fillable = ['name'];

   // the movies function declares a method to return the relation definition between genres and movies. 
   // This is where the pivot table is mentioned to connect the two models.
    public function moviesGenreRelation()
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_movies_genre_table_pivot', 'genre_id', 'movie_id');
    }
}

