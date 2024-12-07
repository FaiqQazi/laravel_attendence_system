<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->default('defaultpassword'); // Set a default password
        });
    }
    
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password'); // Rollback by removing the password field
        });
    }
    
};
