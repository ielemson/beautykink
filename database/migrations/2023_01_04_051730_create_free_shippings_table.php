<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_shippings', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->enum('status', ['is', 'is not']);
            $table->double('amount');
            $table->string('title');
            $table->string('reference_name');
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
        Schema::dropIfExists('free_shippings');
    }
}
