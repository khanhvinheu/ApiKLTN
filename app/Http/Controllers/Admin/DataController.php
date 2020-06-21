<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_nhacungcap;
use App\tbl_chitietkhuyenmai;
use App\tbl_danhmuc;
use App\tbl_danhmuchinhanh;
use App\tbl_khuyenmai;
use App\tbl_phuongthucthanhtoan;
use App\tbl_quyen;
use App\tbl_sanpham;
use App\tbl_taikhoan;
use App\tbl_trangthai;
use App\PasswordReset;

class DataController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl_nhacungcap=tbl_nhacungcap::all();
        $tbl_chitietkhuyenmai=tbl_chitietkhuyenmai::all();
        $tbl_danhmuc=tbl_danhmuc::all();
        $tbl_danhmuchinhanh=tbl_danhmuchinhanh::all();
        $tbl_khuyenmai=tbl_khuyenmai::all();
        $tbl_phuongthucthanhtoan=tbl_phuongthucthanhtoan::all();
        $tbl_quyen=tbl_quyen::all();
        $tbl_sanpham=tbl_sanpham::all();
        $tbl_taikhoan=tbl_taikhoan::all();
        $tbl_trangthai=tbl_trangthai::all();       
        $password_reset=PasswordReset::all();
        return response()->json(compact('tbl_nhacungcap','tbl_chitietkhuyenmai','tbl_danhmuc','tbl_danhmuchinhanh','tbl_khuyenmai','tbl_phuongthucthanhtoan','tbl_quyen','tbl_sanpham','tbl_taikhoan','tbl_trangthai','password_reset'),200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
