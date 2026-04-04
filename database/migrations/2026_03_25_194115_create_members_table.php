<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone', 11)->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->integer('building_no');
            $table->string('street' , 30);
            $table->string('city' ,30);
            $table->json('health_record');
            $table->timestamps();
            $table->string('photo', 255)->nullable();
        });
    }


    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
