<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable(); // Add unique username
            $table->text('bio')->nullable(); // Add a bio column
            $table->string('backgroundPicturePath')->nullable(); // Add background picture path
            $table->string('profilePicturePath')->nullable(); // Add profile picture path
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'bio', 'backgroundPicturePath', 'profilePicturePath']);
        });
    }
};
