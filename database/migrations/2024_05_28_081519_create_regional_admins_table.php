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
        Schema::create('regional_admins', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('administrator_id')->constrained()->onDelete('cascade');
            $table->foreignId('regions_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('visible_password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regional_admins');
    }
};
