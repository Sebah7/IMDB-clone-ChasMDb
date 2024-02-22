<?php

namespace App\Models\Admin;

use App\Models\Admin\cmdb_movies;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_reviews extends Model
{
    use HasFactory;

    protected $table = 'cmdb_reviews';
    protected $fillable = ['movie_id', 'Stars', 'Comment', 'user_id'];

    public function userReviewsRelationship()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movieReviewsRelationship()
    {
        return $this->belongsTo(cmdb_movies::class, 'movie_id');
    }

}