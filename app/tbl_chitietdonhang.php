<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_chitietdonhang extends Model
{
    protected $guarded=[];
	public function sanpham()
	{
		return $this->belongsTo('App\tbl_sanpham','idSanPham','id');
    }
    // public function donhang()
	// {
	// 	return $this->belongsTo('App\tbl_donhang','idDonHang','id');
	// }
}
