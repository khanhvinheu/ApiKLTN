<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChitietdonhangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chitietdonhangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idSanPham')->unsigned();            
            $table->foreign('idSanPham')->references('id')->on('tbl_sanphams')->onDelete('cascade');
            $table->bigInteger('idDonHang')->unsigned();
            $table->foreign('idDonHang')->references('id')->on('tbl_donhangs')->onDelete('cascade');
            $table->bigInteger('soLuong')->nullable(); 
            //
            $table->double('donGia')->default(0);
            $table->double('chietKhau')->default(0);
            $table->double('thanhTien')->default(0);  
            //         
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
        Schema::dropIfExists('tbl_chitietdonhangs');
    }
}
