<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Firewall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewall', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_addr', 32);
            $table->bigInteger('hash_ip_addr')->index()->unsigned()->default(0);
            $table->enum('typeofsave', array('temporary', 'permanent'));
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
        //
    }
}
