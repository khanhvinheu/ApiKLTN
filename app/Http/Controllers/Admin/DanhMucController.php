<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_danhmuc;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use DB;

class DanhMucController extends Controller
{
    public function getDanhMuc(){
        return tbl_danhmuc::all();
    }
    public function index()
    {
        $query = '
        SELECT tbl_danhmucs.*, PARENT."tenDanhmuc" as "NameParent"
        FROM tbl_danhmucs
        LEFT JOIN tbl_danhmucs PARENT
        ON PARENT."id" = tbl_danhmucs."danhMuccha"
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
            $item=tbl_danhmuc::create($request->all());
            $query = '
            SELECT tbl_danhmucs.*, PARENT."tenDanhmuc" as "NameParent"
            FROM tbl_danhmucs
            LEFT JOIN tbl_danhmucs PARENT
            ON PARENT."id" = tbl_danhmucs."danhMuccha"
            WHERE tbl_danhmucs."id" = '.$item['id'];
            $data_find = DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> $data_find[0]
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (QueryException $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Insert Failed',
                'data'=> ''
            );
            return response()->json($result);
        }

    }
    //
    public function show($id)
    {
        $query = '
        SELECT tbl_danhmucs.*, PARENT."tenDanhmuc" as "NameParent"
        FROM tbl_danhmucs
        LEFT JOIN tbl_danhmucs PARENT
        ON PARENT."id" = tbl_danhmucs."danhMuccha"
        WHERE tbl_danhmucs."id" = '.$id;
        $data_find = DB::select($query);
        $result = array(
            'status' => 'OK',
            'message'=> 'Insert Successfully',
            'data'=> $data_find[0]
        );
        return response()->json($result);
    }
    //
    public function update(Request $request, $id)
    {
        try {
            $item=tbl_danhmuc::find($id);
            $item->update($request->only('tenDanhmuc','hinh','danhMuccha'));
            $query = '
            SELECT tbl_danhmucs.*, PARENT."tenDanhmuc" as "NameParent"
            FROM tbl_danhmucs
            LEFT JOIN tbl_danhmucs PARENT
            ON PARENT."id" = tbl_danhmucs."danhMuccha"
            WHERE tbl_danhmucs."id" = '.$item['id'];
            $data_find = DB::select($query);
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data_find[0]
            );
            return response()->json($result);
        } catch (QueryException $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Update Failed',
                'data'=> ''
            );
            return response()->json($result);
        }
    }
    //
    public function destroy($id)
    {
        try {
            tbl_danhmuc::find($id)->delete();
            $result = array(
                'status' => 'OK',
                'message'=> 'Delete Successfully',
                'data'=> ''
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        } catch (QueryException $e) {
            $result = array(
                'status' => 'ER',
                'message'=> 'Delete Failed',
                'data'=> ''
            );
            return response()->json($result);
        }     
    }
}
