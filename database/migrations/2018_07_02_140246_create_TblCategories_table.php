<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblCategories', function (Blueprint $table) {
            $table->increments('PkCategoryID');
            $table->integer('FkParentID')->unsigned()->index()->nullable();
            $table->foreign('FkParentID')->references('PkCategoryID')->on('TblCategories');
            $table->string('StrName');
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
        Schema::dropIfExists('TblCategories');
    }
}
