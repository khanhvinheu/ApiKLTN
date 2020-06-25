<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\tbl_donhang;
use App\tbl_chitietdonhang;
use Illuminate\Http\Response;
use DB;

class DonHangController extends Controller
{
    public function index()
    {
        $query = "
        SELECT tbl_donhangs.*  
        ,   tbl_taikhoans.\"hoTen\" AS \"UserName\"
        ,   SUM(tbl_chitietdonhangs.\"soLuong\" * tbl_chitietdonhangs.\"donGia\") AS \"total\"        
        FROM tbl_donhangs
        LEFT JOIN tbl_taikhoans
        ON tbl_taikhoans.\"id\" = tbl_donhangs.\"idTaiKhoan\"
        LEFT JOIN tbl_chitietdonhangs
        ON tbl_chitietdonhangs.\"idDonHang\" = tbl_donhangs.\"id\"       
        
       
        GROUP BY tbl_donhangs.\"id\"         
        ,   tbl_taikhoans.\"hoTen\"       
        ";
        $items = DB::select($query);
        $result = array(
            'status' => 'OK',
            'message'=> 'Fetch Successfully',
            'data'=> $items
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    
    public function filterByIdTrangThai(Request $request)
    {
        $query = '
        SELECT tbl_donhangs.*
        ,   users."Ten" AS "UserName"
        ,   SUM(tbl_chitietdonhangs."SoLuong" * tbl_chitietdonhangs."DonGia") AS "total"
        FROM tbl_donhangs
        LEFT JOIN users
        ON users."id" = tbl_donhangs."idUser"
        LEFT JOIN tbl_chitietdonhangs
        ON tbl_chitietdonhangs."idHDX" = tbl_donhangs."id"
        GROUP BY tbl_donhangs."id"
        ,   users."Ten"   
        HAVING tbl_donhangs."idTrangThai" = '.$request['idTrangThai'];
        $items = DB::select($query);
        $result = array(
            'status' => 'OK',
            'message'=> 'Fetch Successfully',
            'data'=> $items
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    //
    public function store(Request $request)
    {
        try {
            $hdx= HoaDonXuat::create($request->only('NguoiNhan','DiaChi','DienThoai','idUser','idDiaDiem','idTrangThai'));
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        $dataReturn;
        foreach ($request->cart as $key => $value) {
            try {
                $dt= new ChiTietHoaDonXuat;
                $dt->idHDX=$hdx->id;
                $dt->SoLuong=$value['SoLuong'];
                $dt->DonGia=$value['DonGia'];
                $dt->MaDotNhap=$value['MaDotNhap'];
                $dt->idSanPham=$value['idSanPham'];
                $dt->save();
                $dataReturn[$key]=$dt;
            } catch (Exception $e) {
                return response()->json($e,200,[],JSON_NUMERIC_CHECK);
            }
        }
        return response()->json(compact('hdx','dataReturn'),200,[],JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, $id)
    {
        try {
            $item=tbl_donhang::find($id);
            $item->update($request->only('NguoiNhan','DiaChi','DienThoai','idTrangthai','idDiaDiem','LiDo'));            
            $query = "
            SELECT tbl_donhangs.*  
            ,   tbl_taikhoans.\"hoTen\" AS \"UserName\"
            ,   SUM(tbl_chitietdonhangs.\"soLuong\" * tbl_chitietdonhangs.\"donGia\") AS \"total\"           
            FROM tbl_donhangs
            LEFT JOIN tbl_taikhoans
            ON tbl_taikhoans.\"id\" = tbl_donhangs.\"idTaiKhoan\"
            LEFT JOIN tbl_chitietdonhangs
            ON tbl_chitietdonhangs.\"idDonHang\" = tbl_donhangs.\"id\"
          
            GROUP BY tbl_donhangs.\"id\"         
            ,   tbl_taikhoans.\"hoTen\"            
            HAVING tbl_donhangs.\"id\" =  $item[id]";
            $data_find = DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Fetch Successfully',
                'data'=> $data_find[0]
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Insert Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
    //
    public function show($id)
    {
        $query1 = "
        SELECT tbl_donhangs.*  
        ,   tbl_taikhoans.\"hoTen\" AS \"UserName\"
        ,   SUM(tbl_chitietdonhangs.\"soLuong\" * tbl_chitietdonhangs.\"donGia\") AS \"total\"       
        FROM tbl_donhangs
        LEFT JOIN tbl_taikhoans
        ON tbl_taikhoans.\"id\" = tbl_donhangs.\"idTaiKhoan\"
        LEFT JOIN tbl_chitietdonhangs
        ON tbl_chitietdonhangs.\"idDonHang\" = tbl_donhangs.\"id\"       
        GROUP BY tbl_donhangs.\"id\"         
        ,   tbl_taikhoans.\"hoTen\"
       
        HAVING tbl_donhangs.\"id\" =  $id";
        $data_find1 = DB::select($query1);
        //
        $query2 = "
        SELECT tbl_chitietdonhangs.*
        ,   tbl_sanphams.\"tenSanpham\"
        ,   tbl_sanphams.\"hinhAnh\"
        FROM tbl_chitietdonhangs
        LEFT JOIN tbl_sanphams
        ON tbl_sanphams.\"id\" = tbl_chitietdonhangs.\"idSanPham\"
        INNER JOIN tbl_donhangs
        ON tbl_donhangs.\"id\" = tbl_chitietdonhangs.\"idDonHang\"
        AND tbl_donhangs.\"id\" = $id
        ORDER BY tbl_chitietdonhangs.\"id\" ASC
        ";
        $data_find2 = DB::select($query2);
        //
        $result = array(
            'status' => 'OK',
            'message'=> 'Fetch Successfully',
            'data'=> ['hoadonxuat'=>$data_find1[0], 'detail'=>$data_find2]
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    //
    public function destroy($id)
    {
        try {
            HoaDonXuat::find($id)->delete();
            $result = array(
                'status' => 'OK',
                'message'=> 'Delete Successfully',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Delete Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
}
