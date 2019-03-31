<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPages', function (Blueprint $table) {
            $table->increments('pkPageID');
            $table->enum('enumType', ['about_us', 'mission', 'vision']);
            $table->string('strContentEn');
            $table->string('strContentFr');
            $table->string('strKeywordEn');
            $table->string('strKeywordFr');
            $table->text('txtDescriptionEn');
            $table->text('txtDescriptionFr');
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
        Schema::dropIfExists('pages');
    }
}
