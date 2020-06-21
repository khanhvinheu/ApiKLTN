<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSanphams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanphams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenSanpham');
            $table->bigInteger('gia')->nullable();
            $table->bigInteger('soLuong')->nullable();
            $table->longText('moTa')->nullable();
            $table->longText('hinhAnh')->nullable();
            $table->longText('thongTin')->nullable();
            $table->bigInteger('idNhacungcap')->unsigned();
            $table->foreign('idNhacungcap')->references('id')->on('tbl_nhacungcaps')->onDelete('cascade');
            $table->bigInteger('idDanhMuc')->unsigned();
            $table->foreign('idDanhMuc')->references('id')->on('tbl_danhmucs');
            // ->onDelete('cascade');
            $table->bigInteger('idKhuyenmai')->unsigned()->nullable();
            // $table->foreign('idKhuyenmai')->references('id')->on('tbl_chitietkhuyenmais');
            //  ->onDelete('cascade');
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
        Schema::dropIfExists('tbl_sanphams');
    }
}
