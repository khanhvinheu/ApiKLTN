<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChitietkhuyenmais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietkhuyenmais', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->bigInteger('idKhuyenMai')->unsigned();
            $table->foreign('idKhuyenMai')->references('id')->on('tbl_khuyenmais')->onDelete('cascade');
            $table->bigInteger('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('tbl_sanphams')->onDelete('cascade');
            $table->datetime('NgayBD');
            $table->datetime('NgayKT');
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
        Schema::dropIfExists('tbl_chitietkhuyenmais');
    }
}
