<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_danhgia extends Model
{
    protected $guarded=[];
    public function taikhoan(){
    	return $this->belongsTo('App\tbl_taikhoan','idTaikhoan','id');
    }
}
