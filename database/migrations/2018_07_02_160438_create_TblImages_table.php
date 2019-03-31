<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblImages', function (Blueprint $table) {
            $table->increments('PkImageID');
            $table->integer('FkProductID')->unsigned()->index();
            $table->foreign('FkProductID')->references('PkProductID')->on('TblProducts')->onDelete('cascade');
            $table->string('StrImage');
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
        Schema::dropIfExists('TblImages');
    }
}
