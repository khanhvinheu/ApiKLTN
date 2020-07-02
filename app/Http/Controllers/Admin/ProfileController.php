<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
{
    public function fetchExportOrder(Request $request){
    	
    	$query = '
    	SELECT 
    		tbl_donhangs.* 
		,	tbl_chitietdonhangs."idSanPham"
		,	tbl_chitietdonhangs."donGia"
		,	tbl_chitietdonhangs."soLuong"
		,	tbl_chitietdonhangs."chietKhau"
		,	tbl_chitietdonhangs."thanhTien"
		,	tbl_sanphams."tenSanpham"
		,	tbl_sanphams."hinhAnh"
		,	tbl_trangthais."tenTrangthai" AS "StatusName"		
		,	temp."Total"
    	FROM tbl_donhangs
    	LEFT JOIN tbl_chitietdonhangs 
    	ON tbl_chitietdonhangs."idDonHang" = tbl_donhangs."id"
    	LEFT JOIN tbl_sanphams
    	ON tbl_sanphams."id" = tbl_chitietdonhangs."idSanPham"    	
    	LEFT JOIN tbl_trangthais
    	ON tbl_trangthais."id" = tbl_donhangs."idTrangthai"
    	LEFT JOIN(
			SELECT tbl_chitietdonhangs."idDonHang", SUM(tbl_chitietdonhangs."soLuong" * tbl_chitietdonhangs."donGia") AS "Total"
			FROM tbl_chitietdonhangs
			GROUP BY tbl_chitietdonhangs."idDonHang"
    	) temp 
    	ON temp."idDonHang" = tbl_donhangs."id"
    	WHERE tbl_donhangs."idTaiKhoan" = '.$request->idUser
   		;
    	$result = DB::select($query);
        return response()->json($result,200);
        // return response()->json(200);
    }
}
