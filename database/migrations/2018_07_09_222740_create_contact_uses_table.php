<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblContactUs', function (Blueprint $table) {
            $table->increments('pkContactUsID');
            $table->string('strEmail');
            $table->integer('intPhone');
            $table->integer('intMobile');
            $table->string('strAddress1');
            $table->string('strAddress2');
            $table->string('strMap1');
            $table->string('strMap2');
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
        Schema::dropIfExists('contact_uses');
    }
}
