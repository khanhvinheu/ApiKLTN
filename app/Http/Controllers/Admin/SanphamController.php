<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_sanpham;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use Illuminate\Http\Response;
use Image;

class SanphamController extends Controller
{
    public function index()
    {
        try {
            $query = '
            SELECT 
            tbl_sanphams.* , tbl_danhmucs."tenDanhmuc" , 
            tbl_nhacungcaps."tenNhacungcap" ,
            tbl_nhacungcaps."diaChi" ,
            AVG(tbl_danhgias."Diem") as rating         
            FROM tbl_sanphams   
            LEFT JOIN tbl_danhmucs
            ON tbl_sanphams."idDanhMuc" = tbl_danhmucs."id"     
            LEFT JOIN tbl_nhacungcaps
            ON tbl_sanphams."idNhacungcap" = tbl_nhacungcaps."id"  
            LEFT JOIN tbl_danhgias
            ON tbl_sanphams."id" = tbl_danhgias."idSanPham"    
            GROUP BY (tbl_sanphams.id,tbl_danhmucs."tenDanhmuc",tbl_nhacungcaps."tenNhacungcap" ,tbl_nhacungcaps."diaChi" )

            ';           
            $data=DB::select($query);           
            $result = array(
                'status' => 'OK',
                'message'=> 'Fetch Successfully',
                'data'=> $data,                
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

        try {
            $sanpham;
            $name="";
            if($request->hasFile('hinhAnh'))
            {
                $file=$request->file('hinhAnh');
                $duoi=$file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
                {
                    return  response()->json(['content'=>'File khong dung dinh dang',"error"=>true],200);
                }
                $image_name=$file->getClientOriginalName();
                $name= Str::random(4)."_".$image_name;
                while(file_exists("upload/sanpham/".$name))
                {
                    $name= Str::random(4)."_".$image_name;
                }                 
                $file->move("upload/sanpham",$name);      

            }           
            $img = Image::make(public_path("upload/sanpham/".$name))->resize(900,900);
            /* insert watermark at bottom-right corner with 10px offset */
            $img->insert(public_path('upload/other/logowt.png'), 'bottom-right', 15, 15,'width:20px');
            // $img->save(public_path("upload/other/wwabc.png"));
            $img->save(public_path("upload/sanpham/".$name));

            $sanpham=tbl_sanpham::create($request->only('tenSanpham','gia','soLuong','moTa','thongTin','idNhacungcap','idDanhMuc','idKhuyenmai')+['hinhAnh'=>$name]);            
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> '',
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
    public function update($id ,Request $request)
    {

        try {
            $sanpham=tbl_sanpham::find($id);
            if(tbl_sanpham::where('tenSanpham',$request->tenSanpham)->where('id','!=',$sanpham->id)->count()>0){
                return response()->json(["error"=>true],200);
            }
            $Hinh;
            $oldname=$sanpham->Hinh;
            if($request->hasFile('hinhAnh'))
            {
                $file=$request->file('hinhAnh');
                $duoi=$file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
                {
                    return response()->json("loi dinh dang");
                }
                $image_name=$file->getClientOriginalName();
                $name= Str::random(4)."_".$image_name;
                while(file_exists("upload/sanpham/".$name))
                {
                    $name= Str::random(4)."_".$image_name;
                }
                $file->move("upload/sanpham",$name);
                
                // if($path){
                    $sanpham->update($request->only('tenSanpham','gia','soLuong','moTa','thongTin','idNhacungcap','idDanhMuc','idKhuyenmai')+['hinhAnh'=>$name]);
                // }
            }
            else{
                $sanpham->update($request->all());
            }
           
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> ''
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
    public function destroy($id)
    {
        try {
            $sp=tbl_sanpham::find($id);           
            $sp->delete();            
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
