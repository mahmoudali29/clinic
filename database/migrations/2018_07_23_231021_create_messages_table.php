<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmessages', function (Blueprint $table) {
            $table->increments('pkMessageID');
            $table->string('fldName')->nullable();
            $table->string('fldEmail');
            $table->string('fldSubject')->nullable();
            $table->integer('fldPhone')->nullable();
            $table->text('fldMessage');
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
        Schema::dropIfExists('tblmessages');
    }
}
