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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacherid')->constrained('user')->onDelete('cascade');
            $table->time('starttime');
            $table->time('endtime');
            $table->integer('credit_hours');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('classes');
    }
    
};
