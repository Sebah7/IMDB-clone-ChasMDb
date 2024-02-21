<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cmdb_movies', function (Blueprint $table) {
            $table->string('language');
            $table->integer('release_date');
            $table->integer('runtime');
            $table->string('poster');
            $table->string('trailer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('cmdb_movies', 'language', 'release_date', 'runtime', 'poster', 'trailer'))
            Schema::table('cmdb_movies', function (Blueprint $table) {
                $table->dropColumn('cmdb_movies');
            });
    }
};
