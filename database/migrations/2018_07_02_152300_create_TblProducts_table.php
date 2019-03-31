<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblProducts', function (Blueprint $table) {
            $table->increments('PkProductID');
            $table->integer('FKCategoryID')->unsigned()->index();
            $table->foreign('FKCategoryID')->references('PkCategoryID')->on('TblCategories')->onDelete('cascade');
            $table->string('StrNameEn');
            $table->string('StrNameFr');
            $table->integer('IntCode');
            $table->text('TxtDescreptionEn');
            $table->text('TxtDescreptionFr');
            $table->tinyInteger('TinyIntMinOrder');
            $table->string('StrSupplyAbility');
            $table->string('StrManufactureEn');
            $table->string('StrcertificationFr');
            $table->string('StrTagsEn'); 
            $table->string('StrtagsFr');
            $table->string('StrkeywordsEn');  
            $table->string('StrkeywordsFr');
            $table->integer('IntSize');
            $table->integer('IntWeight');
            $table->integer('IntDimensions');
            $table->integer('IntPackageSize');
            $table->integer('IntCapacity');
            $table->text('TxtMaterialsUsedEn');
            $table->text('TxtMaterialsUsedFr');
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
        Schema::dropIfExists('TblProducts');
    }
}
