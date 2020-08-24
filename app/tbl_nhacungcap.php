<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SendMail;

class tbl_nhacungcap extends Model 
{
	use Notifiable;
    protected $guarded = [];
	public function taikhoan()
	{
		return $this->belongsTo('App\tbl_taikhoan','idTaiKhoan','id');
    }
    public function trangthai()
	{
		return $this->belongsTo('App\tbl_taikhoan','trangThai','id');
	}
	public function lockNccNotification()
    {
		//dd('dsada');
        $this->notify(new SendMail());
	}
	
}
