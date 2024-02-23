<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_director extends Model
{
    public function directorMovieRelation()
    {
        return $this->belongsTo(cmdb_movies::class, 'movie_id');
    }
}
