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
    Schema::create('deleted_users', function (Blueprint $table) {
        $table->id();
        $table->integer('user_id')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('city');
        $table->string('company');
        $table->integer('post_count')->default(0);
        $table->timestamps(); 
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_users');
    }
};
