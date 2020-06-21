<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_nhacungcap extends Model
{
    protected $guarded = [];
	public function taikhoan()
	{
		return $this->belongsTo('App\tbl_taikhoan','idTaiKhoan','id');
    }
    public function trangthai()
	{
		return $this->belongsTo('App\tbl_taikhoan','trangThai','id');
	}
}
