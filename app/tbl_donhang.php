<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_donhang extends Model
{
    protected $guarded=[];
    public function trangthai(){
    	return $this->belongsTo('App\tbl_trangthai','idTrangthai','id');
    }
    // public function chitiethoadonxuat() {
    // 	return $this->hasMany('App\tbl_chitietdonhang','idHDX','id');
    // }
}
