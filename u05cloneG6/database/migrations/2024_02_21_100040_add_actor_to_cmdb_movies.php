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
            $table->string('actor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('cmdb_movies', 'actor'))
            Schema::table('cmdb_movies', function (Blueprint $table) {
                $table->dropColumn('cmdb_movies');
            });
    }
};
