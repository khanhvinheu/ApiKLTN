<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDanhmucs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_danhmucs', function (Blueprint $table) {
            $table->bigIncrements('id');          
            $table->string('tenDanhmuc')->unique();
            $table->bigInteger('danhMuccha')->unsigned()->nullable();
            $table->foreign('danhMuccha')->references('id')->on('tbl_danhmucs')->onDelete('cascade');
            $table->string('hinh')->nullable();
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
        Schema::dropIfExists('tbl_danhmucs');
    }
}
