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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname',15);
            $table->string('lname',15);
            $table->string('profilePic',255);
            $table->string('title',150);
            $table->string('currentPost',150)->nullable();
            $table->string('industry',100)->nullable();
            $table->string('adress',150)->nullable();
            $table->integer('phoneNumber')->nullable();
            $table->string('email')->unique();
            $table->string('password',255);
            $table->foreignId('role_id')->constrained();
            $table->longText('about')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
