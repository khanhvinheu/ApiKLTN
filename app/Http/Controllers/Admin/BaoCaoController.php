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
        // $date = (new DateTime($request->date));
        // $query = '
        // SELECT  SUM((chi_tiet_hoa_don_xuats."DonGia" - chi_tiet_hoa_don_nhaps."GiaNhap")*chi_tiet_hoa_don_xuats."SoLuong") as total
        // FROM hoa_don_xuats
        // LEFT JOIN chi_tiet_hoa_don_xuats
        // ON chi_tiet_hoa_don_xuats."idDonHang" = hoa_don_xuats."id"
        // LEFT JOIN chi_tiet_hoa_don_nhaps  
        // ON chi_tiet_hoa_don_nhaps."id" = chi_tiet_hoa_don_xuats."MaDotNhap"
        // WHERE EXTRACT(MONTH FROM hoa_don_xuats."updated_at") = '.$date->format("m").' 
        // AND EXTRACT(YEAR FROM hoa_don_xuats."updated_at") = '.$date->format("Y").'
        // AND hoa_don_xuats."idTrangthai" = 4
        // '
        // ;
        // $result= DB::select($query);
        // return response()->json($result[0],Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
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
            $sp=DB::table('san_pham_ban_muas')
            ->join('chi_tiet_hoa_don_xuats','chi_tiet_hoa_don_xuats.idSanPham','san_pham_ban_muas.id')
            ->join('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
            ->select('san_pham_ban_muas.id','san_pham_ban_muas.TenSanPham',DB::raw('SUM(chi_tiet_hoa_don_xuats."SoLuong") as "SoLuong"'))
            ->groupBy('san_pham_ban_muas.id','san_pham_ban_muas.TenSanPham')
            ->orderBy('SoLuong','desc')
            ->get();

            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp=DB::table('san_pham_ban_muas')
        ->join('chi_tiet_hoa_don_xuats','chi_tiet_hoa_don_xuats.idSanPham','san_pham_ban_muas.id')
        ->join('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
        ->where('hoa_don_xuats.created_at','>',$ngaybd)
        ->where('hoa_don_xuats.created_at','<',$ngaykt)
        ->select('san_pham_ban_muas.id','san_pham_ban_muas.TenSanPham',DB::raw('SUM(chi_tiet_hoa_don_xuats."SoLuong") as "SoLuong"'))
        ->groupBy('san_pham_ban_muas.id','san_pham_ban_muas.TenSanPham')
        ->orderBy('SoLuong','desc')
        ->get();

        return $sp;
    }
    public function baocao_luotmua(Request $request){
        if($request->NgayBD =='null' &&  $request->NgayKT=='null'){
            $sp= DB::table('chi_tiet_hoa_don_xuats')
            ->leftJoin('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
            ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','hoa_don_xuats.idTaiKhoan')
            ->where('idTaiKhoan','!=',null)
            ->select('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(hoa_don_xuats.id) as "SoLuotMua"'),DB::raw('SUM("SoLuong"*"DonGia") as "ThanhTien"'))
            ->groupBy('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen')
            ->orderBy('SoLuotMua','desc')
            ->get();
            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp= DB::table('chi_tiet_hoa_don_xuats')->leftJoin('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
        ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','hoa_don_xuats.idTaiKhoan')
        ->where('idTaiKhoan','!=',null)
        ->where('hoa_don_xuats.created_at','>',$ngaybd)
        ->where('hoa_don_xuats.created_at','<',$ngaykt)
        ->select('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw('COUNT(hoa_don_xuats.id) as "SoLuotMua"'),DB::raw('SUM("SoLuong"*"DonGia") as "ThanhTien"'))
        ->groupBy('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen')
        ->orderBy('SoLuotMua','desc')
        ->get();
        return $sp;
    }
    public function baocao_giatridonhang(Request $request){
        if($request->NgayBD =='null' &&  $request->NgayKT=='null'){
            $sp= DB::table('chi_tiet_hoa_don_xuats')
            ->leftJoin('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
            ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','hoa_don_xuats.idTaiKhoan')
            ->where('idTaiKhoan','!=',null)
            ->select('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw("COUNT(hoa_don_xuats.id) as SoLuotMua"),DB::raw("SUM(SoLuong*DonGia) as ThanhTien"))
            ->groupBy('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen')
            ->orderBy('ThanhTien','desc')->get();
            return $sp;
        }
        $ngaybd = Carbon::createFromFormat('d-m-Y',$request->NgayBD);
        $ngaykt = Carbon::createFromFormat('d-m-Y',$request->NgayKT);
        $sp= DB::table('chi_tiet_hoa_don_xuats')->leftJoin('hoa_don_xuats','hoa_don_xuats.id','chi_tiet_hoa_don_xuats.idDonHang')
        ->leftJoin('tbl_taikhoans','tbl_taikhoans.id','hoa_don_xuats.idTaiKhoan')
        ->where('idTaiKhoan','!=',null)
        ->where('hoa_don_xuats.created_at','>',$ngaybd)
        ->where('hoa_don_xuats.created_at','<',$ngaykt)
        ->select('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen',DB::raw("COUNT(hoa_don_xuats.id) as SoLuotMua"),DB::raw("SUM(SoLuong*DonGia) as ThanhTien"))
        ->groupBy('hoa_don_xuats.idTaiKhoan','tbl_taikhoans.hoTen')
        ->orderBy('ThanhTien','desc')
        ->get();
        return $sp;
    }
}
