<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Admin\cmdb_movies;


class cmdb_actors extends Model
{
    protected $table = 'cmdb_actors';
    protected $fillable = ['name'];

    public function movies() : BelongsToMany
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_actor_cmdb_movie', 'actor_id', 'movie_id');
    }
}
