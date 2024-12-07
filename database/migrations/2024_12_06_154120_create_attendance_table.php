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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classid')->constrained('classes')->onDelete('cascade');
            $table->foreignId('studentid')->constrained('user')->onDelete('cascade');
            $table->boolean('isPresent')->default(0);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
    
};
