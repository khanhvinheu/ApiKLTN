<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_quyen extends Model
{
    protected $guarded=[];
    public function user(){
    	return $this->hasMany('App\User','idQuyen','id');
    }
}
