<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmdb_actors extends Model
{
    use HasFactory;

    protected $tabel = 'cmdb_actors';
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(cmdb_movies::class, 'cmdb_movies_actor_table_pivot', 'movie_id', 'actor_id');
    }
}
