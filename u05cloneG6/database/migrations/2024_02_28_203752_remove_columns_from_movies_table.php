<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('cmdb_movies', function (Blueprint $table) {
            $table->dropColumn('actor');
            $table->dropColumn('director');
            $table->dropColumn('genre');
        });
    }

    public function down()
    {
        Schema::table('cmdb_movies', function (Blueprint $table) {
            $table->string('actor')->nullable();
            $table->string('director')->nullable();
            $table->string('genre')->nullable();
        });
    }
}
?>