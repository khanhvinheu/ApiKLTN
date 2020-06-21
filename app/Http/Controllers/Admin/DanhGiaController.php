<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_danhgia;
use DB;
use Illuminate\Http\Response;

class DanhGiaController extends Controller
{
    public function index()
    {
        try {
            $query = '
            SELECT tbl_danhgias."id"
            ,   tbl_danhgias."Diem"
            ,   tbl_danhgias."NoiDung"
            ,   tbl_danhgias."idTaikhoan"
            ,   tbl_taikhoans."hoTen" AS "TenUser"
            ,   tbl_sanphams."tenSanpham"
            FROM tbl_danhgias
            LEFT JOIN tbl_taikhoans
            ON tbl_taikhoans."id" = tbl_danhgias."idTaikhoan"
            LEFT JOIN tbl_sanphams
            ON tbl_sanphams."id" = tbl_danhgias."idSanPham"
            ';
            $data=DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Fetch Successfully',
                'data'=> $data
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Fetch Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
    public function store(Request $request)
    {
        if(DanhGia::where('idUser',$request->idUser)->where('idSanPham',$request->idSanPham)->count()==0){
            try {
                $data=DanhGia::create($request->all());
                $query = '
                SELECT tbl_danhgias."id"
                ,   tbl_danhgias."Diem"
                ,   tbl_danhgias."NoiDung"
                ,   tbl_danhgias."idTaikhoan"
                ,   tbl_taikhoans."hoTen" AS "TenUser"
                ,   tbl_sanphams."TenSanPham"
                FROM tbl_danhgias
                LEFT JOIN taikhoans
                ON taikhoans."id" = tbl_danhgias."idTaikhoan"
                LEFT JOIN tbl_sanphams
                ON tbl_sanphams."id" = tbl_danhgias."idSanPham"
                WHERE tbl_danhgias."id" = '. $data['id'];
                $rating=DB::select($query);
                $result = array(
                    'status' => 'OK',
                    'message'=> 'Insert Successfully',
                    'data'=> $rating
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
        $result = array(
            'status' => 'ER',
            'message'=> 'Rating Failed',
            'data'=> ''
        );
        return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, $id)
    {
        $data=tbl_danhgia::find($id);
        try {
            $data->update($request->only('Diem','NoiDung'));
        } catch (Exception $e) {
            return response()->json($e,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($data,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }

    public function destroy($id)
    {
        try {
            tbl_danhgia::find($id)->delete();
            $result = array(
                'status' => 'OK',
                'message'=> 'Deleted Successfully',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Deleted Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        }
    }
}
