<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_catagories', function (Blueprint $table) {
            $table->increments('catagory_id');
            $table->string('catagory_name');
            $table->text('catagory_description');
            $table->tinyInteger('catagory_ststus');
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
        Schema::dropIfExists('tbl_catagories');
    }
}
