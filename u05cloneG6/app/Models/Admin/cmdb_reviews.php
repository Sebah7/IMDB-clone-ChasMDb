<?php

namespace App\Models\Admin;

use App\Models\Admin\cmdb_movies;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cmdb_reviews extends Model
{

// the soft delete is goint to delte the data from the view but sill keep it in the database.
use SoftDeletes;

    protected $table = 'cmdb_reviews';
    protected $fillable = ['movie_id', 'stars', 'comment', 'user_id'];

    public function userReviewsRelationship()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movieReviewsRelationship()
    {
        return $this->belongsTo(cmdb_movies::class, 'movie_id');
    }

}
