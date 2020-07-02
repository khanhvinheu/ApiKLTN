<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\tbl_donhang;
use App\tbl_trangthai;
use DB;
use DateTime;
use App\tbl_chitietdonhang;
use Illuminate\Http\Response;

class BaoCaoController extends Controller
{
    public function getDoanhThuTheoThang(Request $request){
        $date = (new DateTime($request->date));
        $query = '
        SELECT  SUM((tbl_chitietdonhangs."donGia")*tbl_chitietdonhangs."soLuong") as total
        FROM tbl_donhangs
        LEFT JOIN tbl_chitietdonhangs
        ON tbl_chitietdonhangs."idDonHang" = tbl_donhangs."id"        
        WHERE EXTRACT(MONTH FROM tbl_donhangs."updated_at") = '.$date->format("m").' 
        AND EXTRACT(YEAR FROM tbl_donhangs."updated_at") = '.$date->format("Y").'
        AND tbl_donhangs."idTrangthai" = 4
        '
        ;
        $result= DB::select($query);
        return response()->json($result[0],Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    public function get_array_top(){

        $data=DB::table('tbl_chitietdonhangs')
        ->select('idSanPham',DB::raw('SUM("soLuong") as "soLuong"'))
        ->groupBy('idSanPham')
        ->orderBy('soLuong','desc')->pluck('idSanPham');
        return response()->json($data,200);
    }
    public function baocao_donhang(Request $request){

        $ngaybd = (new DateTime($request->NgayBD))->format('Y-m-d');
        $ngaykt = (new DateTime($request->NgayKT))->format('Y-m-d');
        $query = "
        SELECT  tbl_donhangs.*, tbl_taikhoans.\"hoTen\" as \"UserName\",  tbl_trangthais.\"tenTrangthai\" as \"StatusName\", SUM(tbl_chitietdonhangs.\"donGia\"*tbl_chitietdonhangs.\"soLuong\") as total
        FROM tbl_donhangs
        LEFT JOIN tbl_chitietdonhangs
        ON tbl_chitietdonhangs.\"idDonHang\" = tbl_donhangs.\"id\"
        LEFT JOIN tbl_taikhoans  
        ON tbl_taikhoans.\"id\" = tbl_donhangs.\"idTaiKhoan\"
        LEFT JOIN tbl_trangthais  
        ON tbl_trangthais.\"id\" = tbl_donhangs.\"idTrangthai\"
        GROUP BY tbl_donhangs.\"id\", tbl_trangthais.\"id\", tbl_taikhoans.\"id\"
        HAVING 
        tbl_donhangs.\"updated_at\" between '".$ngaybd."'::date AND '".$ngaykt."'::date
        AND tbl_donhangs.\"idTrangthai\" = 4
        " ;
        $result= DB::select($query);
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    public function baocao_topsanpham(Request $request){
        if($request->NgayBD =='null' &&  $request->NgayKT=='null'){
            $sp=DB::table('tbl_sanphams')
            ->join('tbl_chitietdonhangs','tbl_chitietdonhangs.idSanPham','tbl_sanphams.id')
            ->join('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
            ->select('tbl_sanphams.id','tbl_sanphams.tenSanpham',DB::raw('SUM(tbl_chitietdonhangs."soLuong") as "soLuong"'))
            ->groupBy('tbl_sanphams.id','tbl_sanphams.tenSanpham')
            ->orderBy('soLuong','desc')
            ->get();

            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp=DB::table('tbl_sanphams')
        ->join('tbl_chitietdonhangs','tbl_chitietdonhangs.idSanPham','tbl_sanphams.id')
        ->join('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
        ->where('tbl_donhangs.created_at','>',$ngaybd)
        ->where('tbl_donhangs.created_at','<',$ngaykt)
        ->select('tbl_sanphams.id','tbl_sanphams.tenSanpham',DB::raw('SUM(tbl_chitietdonhangs."soLuong") as "soLuong"'))
        ->groupBy('tbl_sanphams.id','tbl_sanphams.tenSanpham')
        ->orderBy('soLuong','desc')
        ->get();

        return $sp;
    }
    public function baocao_luotmua(Request $request){
        if($request->NgayBD =='null' &&  $request->NgayKT=='null'){
            $sp= DB::table('tbl_chitietdonhangs')
            ->leftJoin('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
            ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','tbl_donhangs.idTaiKhoan')
            ->where('idTaiKhoan','!=',null)
            ->select('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(tbl_donhangs.id) as "SoLuotMua"'),DB::raw('SUM("soLuong"*"donGia") as "ThanhTien"'))
            ->groupBy('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen')
            ->orderBy('SoLuotMua','desc')
            ->get();
            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp= DB::table('tbl_chitietdonhangs')->leftJoin('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
        ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','tbl_donhangs.idTaiKhoan')
        ->where('idTaiKhoan','!=',null)
        ->where('tbl_donhangs.created_at','>',$ngaybd)
        ->where('tbl_donhangs.created_at','<',$ngaykt)
        ->select('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(tbl_donhangs.id) as "SoLuotMua"'),DB::raw('SUM("soLuong"*"donGia") as "ThanhTien"'))
        ->groupBy('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen')
        ->orderBy('SoLuotMua','desc')
        ->get();
        return $sp;
    }
    public function baocao_giatridonhang(Request $request){
        if($request->NgayBD =='null' &&  $request->NgayKT=='null'){
            $sp= DB::table('tbl_chitietdonhangs')
            ->leftJoin('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
            ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','tbl_donhangs.idTaiKhoan')
            ->where('idTaiKhoan','!=',null)
            ->select('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(tbl_donhangs.id) as "SoLuotMua"'),DB::raw('SUM("soLuong"*"donGia") as "ThanhTien"'))
            ->groupBy('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen')
            ->orderBy('ThanhTien','desc')
            ->get();
            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp= DB::table('tbl_chitietdonhangs')->leftJoin('tbl_donhangs','tbl_donhangs.id','tbl_chitietdonhangs.idDonHang')
        ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','tbl_donhangs.idTaiKhoan')
        ->where('idTaiKhoan','!=',null)
        ->where('tbl_donhangs.created_at','>',$ngaybd)
        ->where('tbl_donhangs.created_at','<',$ngaykt)
        ->select('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(tbl_donhangs.id) as "SoLuotMua"'),DB::raw('SUM("soLuong"*"donGia") as "ThanhTien"'))
        ->groupBy('tbl_donhangs.idTaiKhoan','tbl_taikhoans.hoTen')
        ->orderBy('ThanhTien','desc')
        ->get();
        return $sp;
    }
}
