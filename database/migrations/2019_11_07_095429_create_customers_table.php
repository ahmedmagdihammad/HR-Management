<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mobile_1');
            $table->string('mobile_2');
            $table->string('address');
            $table->string('n_passport_id');
            $table->string('email');
            $table->string('gender');
            $table->string('job');
            $table->string('date_birth');
            $table->string('picture');
            $table->string('nationality');
            $table->string('wishes');
            $table->string('status')->default(1);
            $table->string('notes');
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
        Schema::dropIfExists('customers');
    }
}
