<?php

namespace App\Http\Controllers\Admin;
use App\tbl_trangthai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrangThaiController extends Controller
{
    //
    public function getTrangthai(){
        $data=tbl_trangthai::where('id',1)->first();
        return $data;
    }
}
