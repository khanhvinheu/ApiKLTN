<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_phuongthucthanhtoan;
use Illuminate\Http\Response;
use DB;

class PhuongThucTTController extends Controller
{
    public function index()
    {
        $query = '
        SELECT tbl_phuongthucthanhtoans.*
        FROM tbl_phuongthucthanhtoans
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
            $item=tbl_phuongthucthanhtoan::create($request->all());
            $query = '
            SELECT tbl_phuongthucthanhtoans.*
            FROM tbl_phuongthucthanhtoans
            WHERE tbl_phuongthucthanhtoans."id" = '.$item['id'];
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
        SELECT tbl_phuongthucthanhtoans.*
        FROM tbl_phuongthucthanhtoans
        WHERE tbl_phuongthucthanhtoans."id" = '.$id;
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
            $item=tbl_phuongthucthanhtoan::find($id);
            $item->update($request->only('tenPhuongthuc'));
            $query = '
            SELECT tbl_phuongthucthanhtoans.*
            FROM tbl_phuongthucthanhtoans
            WHERE tbl_phuongthucthanhtoans."id" = '.$item['id'];
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
            tbl_phuongthucthanhtoan::find($id)->delete();
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
