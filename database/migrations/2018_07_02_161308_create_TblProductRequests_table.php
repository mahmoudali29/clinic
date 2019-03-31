<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblProductRequests', function (Blueprint $table) {
            $table->increments('PKProductRequestID');
            $table->integer('FkProductID')->unsigned()->index();
            $table->foreign('FkProductID')->references('PkProductID')->on('TblProducts')->onDelete('cascade');
            $table->string('StrCompanyName');
            $table->string('StrName');
            $table->string('StrPosition');
            $table->integer('IntMobile');
            $table->integer('IntPhone');
            $table->string('StrCountry');
            $table->text('TxtNotes');
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
        Schema::dropIfExists('TblProductRequests');
    }
}
