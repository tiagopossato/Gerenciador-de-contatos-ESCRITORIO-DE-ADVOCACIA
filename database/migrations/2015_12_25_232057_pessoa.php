<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pessoa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nome');
            $table->text('email')->unique();
            $table->integer('cidade');
            $table->foreign('cidade')->references('id')->on('cidades');
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
