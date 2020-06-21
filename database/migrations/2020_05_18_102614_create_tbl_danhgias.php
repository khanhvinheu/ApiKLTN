<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDanhgias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_danhgias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Diem')->default(5);
            $table->string('NoiDung')->nullable();
            $table->bigInteger('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('tbl_sanphams')->onDelete('cascade');
            $table->bigInteger('idTaikhoan')->unsigned();
            $table->foreign('idTaikhoan')->references('id')->on('tbl_taikhoans')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_danhgias');
    }
}
