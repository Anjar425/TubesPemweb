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
        Schema::table('plants', function (Blueprint $table) {
            $table->float('leaf_width')->change();
            $table->float('height')->change();
            $table->float('diameter')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            // Assuming previous types were integers, adjust if necessary
            $table->integer('leaf_width')->change();
            $table->integer('height')->change();
            $table->integer('diameter')->change();
        });
    }
};
