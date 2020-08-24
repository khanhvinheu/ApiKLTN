<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SuccesslyDH;

class tbl_donhang extends Model
{
    protected $guarded=[];
    use Notifiable;
    public function trangthai(){
    	return $this->belongsTo('App\tbl_trangthai','idTrangthai','id');
    }
    // public function chitiethoadonxuat() {
    // 	return $this->hasMany('App\tbl_chitietdonhang','idHDX','id');
    // }
    public function Xacnhandonhang()
    {	
        $this->notify(new SuccesslyDH());
    }
    
}
