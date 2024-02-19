<?php

namespace App\Models\Admin;
namespace App\Models;

use App\Models\Admin\cmdb_movies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_reviews extends Model
{
    use HasFactory;

    protected $table = 'cmdb_reviews';
    protected $fillable = ['Movieid', 'Stars', 'Comment', 'Userid'];

    public function userReviewRelationship()
    {
        return $this->belongsTo(User::class, 'Userid');
    }

    public function movie()
    {
        return $this->belongsTo(cmdb_movies::class, 'Movieid');
    }

}