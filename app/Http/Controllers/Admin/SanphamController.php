<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_sanpham;
use App\tbl_chitietkhuyenmai;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use Illuminate\Http\Response;
use Image;
use Carbon\Carbon;


class SanphamController extends Controller
{
    public function index()
    {
        try {
            // $query = '
            // SELECT 
            // tbl_sanphams.* , tbl_danhmucs."tenDanhmuc" , 
            // tbl_nhacungcaps."tenNhacungcap" ,
            // tbl_nhacungcaps."diaChi" ,
            // AVG(tbl_danhgias."Diem") as rating ,
            // tbl_khuyenmais."tieuDe"        
            // FROM tbl_sanphams   
            // LEFT JOIN tbl_danhmucs
            // ON tbl_sanphams."idDanhMuc" = tbl_danhmucs."id"     
            // LEFT JOIN tbl_nhacungcaps
            // ON tbl_sanphams."idNhacungcap" = tbl_nhacungcaps."id"  
            // LEFT JOIN tbl_danhgias
            // ON tbl_sanphams."id" = tbl_danhgias."idSanPham"  
            // LEFT JOIN tbl_chitietkhuyenmais
            // ON tbl_sanphams."idKhuyenmai" = tbl_chitietkhuyenmais."id"            
            // LEFT JOIN tbl_khuyenmais
            // ON tbl_khuyenmais."id" = tbl_chitietkhuyenmais."idKhuyenMai"
            // GROUP BY (tbl_sanphams.id,tbl_danhmucs."tenDanhmuc",
            //           tbl_nhacungcaps."tenNhacungcap" ,
            //           tbl_nhacungcaps."diaChi",
            //           tbl_chitietkhuyenmais."idKhuyenMai",
            //           tbl_khuyenmais."tieuDe" )
            // ';  
            $dt = 	Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 
            $ngaykt=date('Y-m-d ', strtotime($dt));            
            $query = '
            SELECT 
            tbl_sanphams.* , tbl_danhmucs."tenDanhmuc" , 
                             tbl_nhacungcaps."tenNhacungcap" ,
                             tbl_nhacungcaps."diaChi" ,
                             AVG(tbl_danhgias."Diem") as rating ,
                             tbl_khuyenmais."tieuDe",
                             tbl_khuyenmais."chietKhau",
                             tbl_nhacungcaps."trangThai" as status,
                             tbl_nhasanxuats."id" as idNSX
            FROM tbl_sanphams             
            LEFT JOIN tbl_danhmucs
            ON tbl_sanphams."idDanhMuc" = tbl_danhmucs."id"     
            LEFT JOIN tbl_nhacungcaps
            ON tbl_sanphams."idNhacungcap" = tbl_nhacungcaps."id"  
            LEFT JOIN tbl_danhgias
            ON tbl_sanphams."id" = tbl_danhgias."idSanPham"  
            LEFT JOIN tbl_chitietkhuyenmais 
            ON tbl_sanphams."idKhuyenmai" = tbl_chitietkhuyenmais."id" AND Date(tbl_chitietkhuyenmais."NgayBD") <= NOW()::DATE 
            AND Date(tbl_chitietkhuyenmais."NgayKT") >= NOW()::DATE 
            LEFT JOIN tbl_khuyenmais
            ON tbl_khuyenmais."id" = tbl_chitietkhuyenmais."idKhuyenMai"  
            LEFT JOIN tbl_nhasanxuats
            ON tbl_sanphams."idNSX" = tbl_nhasanxuats."id"
            WHERE tbl_nhacungcaps."trangThai"=1            
            GROUP BY (tbl_sanphams.id,tbl_danhmucs."tenDanhmuc",
                      tbl_nhacungcaps."tenNhacungcap" ,
                      tbl_nhacungcaps."diaChi",
                      tbl_chitietkhuyenmais."idKhuyenMai",
                      tbl_khuyenmais."tieuDe",
                      tbl_khuyenmais."chietKhau",
                      tbl_nhacungcaps."trangThai",
                      tbl_nhasanxuats."id"
                      )
                      
            '; 
            $data=DB::select($query);           
            //dd($data->NgayBD < $ngaykt);            
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

            $sanpham=tbl_sanpham::create($request->only('tenSanpham','gia','soLuong','moTa','thongTin','idNhacungcap','idDanhMuc','idKhuyenmai','idNSX')+['hinhAnh'=>$name]);            
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
                    $img = Image::make(public_path("upload/sanpham/".$name))->resize(900,900);
                    /* insert watermark at bottom-right corner with 10px offset */
                    $img->insert(public_path('upload/other/logowt.png'), 'bottom-right', 15, 15,'width:20px');
                    // $img->save(public_path("upload/other/wwabc.png"));
                    $img->save(public_path("upload/sanpham/".$name));
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
