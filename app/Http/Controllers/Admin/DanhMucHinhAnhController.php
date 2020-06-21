<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_danhmuchinhanh;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use DB;
use Image;

class DanhMucHinhAnhController extends Controller
{
    public function index()
    {
        $query = '
        SELECT tbl_danhmuchinhanhs.*, tbl_sanphams."tenSanpham"
        FROM tbl_danhmuchinhanhs
        LEFT JOIN tbl_sanphams
        ON tbl_danhmuchinhanhs."idSanPham" = tbl_sanphams."id"
        ';
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
            $item;
            if($request->hasFile('hinhAnh'))
            {
                $file=$request->file('hinhAnh');
                $duoi=$file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
                {   
                    $result = array(
                        'status' => 'ER',
                        'message'=> 'File Format is not support',
                        'data'=> ''
                    );
                    return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
                }
                // $disk = Storage::disk('public');
                // $path=$disk->put('sanpham', $file);
                // $name=Str::after($path, 'sanpham/');

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
            $img->insert(public_path('upload/other/logowt.png'), 'bottom-center', 15, 15,'width:20px');
            // $img->save(public_path("upload/other/wwabc.png"));
            $img->save(public_path("upload/sanpham/".$name));

            $item=tbl_danhmuchinhanh::create($request->only('idSanPham')+['hinhAnh'=>$name]);

            // if($path){
            // }
            $query = '
            SELECT tbl_danhmuchinhanhs.*, tbl_sanphams."tenSanpham"
            FROM tbl_danhmuchinhanhs
            LEFT JOIN tbl_sanphams
            ON tbl_danhmuchinhanhs."idSanPham" = tbl_sanphams."id"
            WHERE tbl_danhmuchinhanhs."id" = '.$item['id'];
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
        $data_find=tbl_danhmuchinhanh::find($id);
        $result = array(
            'status' => 'OK',
            'message'=> 'Insert Successfully',
            'data'=> $data_find
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    //
    public function update(Request $request, $id)
    {
        try {
            $item=tbl_danhmuchinhanh::find($id);
            $hinhAnh;
            $oldname=$item->hinhAnh;
            if($request->hasFile('hinhAnh'))
            {
                $file=$request->file('hinhAnh');
                $duoi=$file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
                {
                    $result = array(
                        'status' => 'ER',
                        'message'=> 'File Format is not support',
                        'data'=> ''
                    );
                    return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
                }
                // $disk = Storage::disk('gcs');
                // $disk->delete('sanpham/'.$oldname);
                // $path=$disk->put('sanpham', $file);
                // $name=Str::after($path, 'sanpham/');
                // if($path){
                    // }
                    $image_name=$file->getClientOriginalName();
                    $name= Str::random(4)."_".$image_name;
                    while(file_exists("upload/sanpham/".$name))
                    {
                        $name= Str::random(4)."_".$image_name;
                    }
                    $file->move("upload/sanpham",$name);
                    $item->update($request->only('idSanPham')+['hinhAnh'=>$name]);
            }
            else{
                $item->update($request->all());
            }
            $data_find=tbl_danhmuchinhanh::find($id);
            $result = array(
                'status' => 'OK',
                'message'=> 'Update Successfully',
                'data'=> $data_find
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
            tbl_danhmuchinhanh::find($id)->delete();
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
