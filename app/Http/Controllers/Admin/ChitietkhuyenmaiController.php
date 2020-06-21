<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_chitietkhuyenmai;
use Illuminate\Http\Response;
use DB;

class ChitietkhuyenmaiController extends Controller
{
    public function index()
    {
        
        $query = '
        SELECT tbl_chitietkhuyenmais.*,tbl_khuyenmais."tieuDe",tbl_sanphams."tenSanpham"
        FROM tbl_chitietkhuyenmais
        LEFT JOIN tbl_khuyenmais
        ON tbl_chitietkhuyenmais."idKhuyenMai" = tbl_khuyenmais."id"
        LEFT JOIN tbl_sanphams
        ON tbl_chitietkhuyenmais."idSanPham" = tbl_sanphams."id"
        ';
        $data = DB::select($query);
        $result = array(
            'status' => 'OK',
            'message'=> 'Fetch Successfully',
            'data'=> $data
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    //
    public function store(Request $request)
    {
        try {
            $item=tbl_chitietkhuyenmai::create($request->all());
            $query = '
            SELECT tbl_chitietkhuyenmais.*
            FROM tbl_chitietkhuyenmais
            WHERE tbl_chitietkhuyenmais."id" = '.$item['id'];
            $data_find = DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
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
        $query = '
        SELECT tbl_chitietkhuyenmais.*
        FROM tbl_chitietkhuyenmais
        WHERE tbl_chitietkhuyenmais."id" = '.$id;
        $data_find = DB::select($query);
        $result = array(
            'status' => 'OK',
            'message'=> 'Insert Successfully',
            'data'=> $data_find[0]
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    //
    public function update(Request $request, $id)
    {
        try {
            $item=tbl_chitietkhuyenmai::find($id);
            $item->update($request->only('idSanPham','idKhuyenMai','NgayBD','NgayKT'));
            $query = '
            SELECT tbl_chitietkhuyenmais.*
            FROM tbl_chitietkhuyenmais
            WHERE tbl_chitietkhuyenmais."id" = '.$item['id'];
            $data_find = DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data_find[0]
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (Exception $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Update Failed',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
    //
    public function destroy($id)
    {
        try {
            tbl_chitietkhuyenmai::find($id)->delete();
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
