<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_chitietkhuyenmai extends Model
{
    protected $guarded=[];    
    public function chitietkhuyenmai()
	{
		return $this->hasMany('App\tbl_chitietkhuyenmai','idKhuyenMai','id');
    }
    public function sanpham()
	{
		return $this->hasMany('App\tbl_sanpham','idSanPham','id');
    }
}
