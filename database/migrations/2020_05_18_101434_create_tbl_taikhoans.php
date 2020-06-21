<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTaikhoans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_taikhoans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoTen')->nullable();
            $table->string('gioiTinh')->nullable();
            $table->datetime('ngaySinh')->nullable();
            $table->string('dienThoai')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('diaChi')->nullable();
            $table->string('password');
            $table->longText('hinh')->nullable();
            $table->rememberToken();            
            $table->bigInteger('idQuyen')->unsigned()->default('3');
            $table->foreign('idQuyen')->references('id')->on('tbl_quyens')->onDelete('cascade');    
            $table->integer('trangThai')->default(0);
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
        Schema::dropIfExists('tbl_taikhoans');
    }
}
