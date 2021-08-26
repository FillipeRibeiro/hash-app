<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HashInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('batch');
            $table->string('key', 8);
            $table->string('input_string');
            $table->string('word_concat');
            $table->string('hash');
            $table->integer('try');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_info');
    }
}
