<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDonhangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donhangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            //
            $table->string('NguoiNhan');
            $table->string('DiaChi');
            $table->string('DienThoai');
            $table->double('tongTien')->default(0);
            $table->double('phiShip')->default(0);
            $table->double('tongtientra')->default(0);
            $table->string('LiDo')->nullable();
            //$table->bigInteger('idDiaDiem')->nullable();
            //
            //$table->string('diaChinhanhang')->nullable();
            $table->bigInteger('idTaiKhoan')->unsigned();
            $table->foreign('idTaiKhoan')->references('id')->on('tbl_taikhoans')->onDelete('cascade');
            $table->bigInteger('idPhuongthucTT')->unsigned();
            $table->foreign('idPhuongthucTT')->references('id')->on('tbl_phuongthucthanhtoans')->onDelete('cascade');
            $table->datetime('ngayDat');
            $table->bigInteger('idTrangthai')->unsigned();
            $table->foreign('idTrangthai')->references('id')->on('tbl_trangthais')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_donhangs');
    }
}
