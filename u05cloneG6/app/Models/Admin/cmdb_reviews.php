<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_reviews extends Model
{
    public function reviewMovieRelation()

    {
        return $this->belongsToMany(cmdb_movies::class, 'movie_id');
    }
}
