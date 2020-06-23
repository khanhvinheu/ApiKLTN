<?php

namespace App\Http\Controllers\Admin;
use App\tbl_trangthai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrangThaiController extends Controller
{
    public function index()
    {
        $data=tbl_trangthai::all();
        return response()->json($data,200,[],JSON_NUMERIC_CHECK);
    }

    public function store(Request $request)
    {
        try {
           $data= tbl_trangthai::create($request->all());
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($data,200,[],JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, $id)
    {
        $data=tbl_trangthai::find($id);
        try {
            $data->update($request->only('tenTrangthai'));
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($data,200,[],JSON_NUMERIC_CHECK);
    }

    public function destroy($id)
    {
        try {
            tbl_trangthai::find($id)->delete();
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json(['error'=>false],200,[],JSON_NUMERIC_CHECK);
    }
}
