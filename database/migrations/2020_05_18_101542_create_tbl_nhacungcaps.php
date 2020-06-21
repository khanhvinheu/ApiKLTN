<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNhacungcaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhacungcaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenNhacungcap')->nullable();;
            $table->string('diaChi')->nullable();
            $table->string('soDienthoai')->nullable();
            $table->string('email')->nullable();
            $table->longText('thongTin')->nullable();
            $table->longText('moTa')->nullable();
            $table->longText('hinhAnh')->nullable();
            $table->integer('trangThai')->default(0);
            $table->bigInteger('idTaiKhoan')->unsigned()->unique();;
            $table->foreign('idTaiKhoan')->references('id')->on('tbl_taikhoans')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_nhacungcaps');
    }
}
