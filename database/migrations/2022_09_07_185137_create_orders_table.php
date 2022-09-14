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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('First_name');
            $table->string('Last_name')->nullable();
            $table->string('Address_1');
            $table->string('Address_2')->nullable();
            $table->string('email');
            $table->string('Phone');
            $table->string('Country');
            $table->string('City');
            $table->string('State');
            $table->integer('zip');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('Confirmed',['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
