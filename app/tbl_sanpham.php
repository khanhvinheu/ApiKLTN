<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_sanpham extends Model
{
    protected $guarded = [];
	public function nhacungcap()
	{
		return $this->belongsTo('App\tbl_nhacungcap','idNhacungcap','id');
	}
	public function danhmuc()
	{
		return $this->belongsTo('App\tbl_danhmuc','idDanhMuc','id');
	}
	public function hinhanh()
	{
		return $this->hasMany('App\tbl_danhmuchinhanh','hinhAnh','id');
	}
	// public function chitietkhuyenmai()
	// {
	// 	return $this->hasMany('App\tbl_chitietkhuyenmai','idKhuyenmai','id');
	// }
}
