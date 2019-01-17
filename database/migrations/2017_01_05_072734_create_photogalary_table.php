<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotogalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_galary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('photo_title');
            $table->text('short_description');
            $table->string('photo');
            $table->tinyInteger('photo_status');
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
        Schema::drop('tbl_galary');
    }
}
