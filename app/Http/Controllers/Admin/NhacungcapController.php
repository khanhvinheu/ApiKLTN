<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Response;
use App\tbl_nhacungcap;
use App\tbl_taikhoan;
use Image;

class NhacungcapController extends Controller
{
    public function index()
    {
        try {
            $query = '
            SELECT tbl_nhacungcaps.*, tbl_taikhoans."idQuyen",tbl_taikhoans."trangThai" as trangThaitk         
            FROM tbl_nhacungcaps  
            LEFT JOIN tbl_taikhoans
            ON tbl_nhacungcaps."idTaiKhoan" = tbl_taikhoans."id" 
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
        try {
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
            //$item=tbl_nhacungcap::create($request->all());
            $item=tbl_nhacungcap::create($request->only('tenNhacungcap','diaChi','soDienthoai','email','trangThai','idTaiKhoan')+['hinhAnh'=>$name]);
            $data_find = tbl_nhacungcap::find($item['id']);
            $result = array(
                'status' => 'OK',
                'message'=> 'Insert Successfully',
                'data'=> $data_find
            );
            return response()->json($result);
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
        $data_find=tbl_nhacungcap::find($id);
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
            $data_find=tbl_nhacungcap::find($id);            
            $data_find->update($request->only('trangThai','soDienthoai','tenNhacungcap','diaChi','thongTin','moTa','email'));
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
    public function changehinh(Request $request, $id)
    {
        $user=tbl_nhacungcap::find($id);
        $oldname=$user->Hinh?$user->Hinh:null;
        if($request->hasFile('hinh'))
        {
            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg')
            {
                return  response()->json('File khong dung dinh dang');
            }
            // $disk = Storage::disk('gcs');
            // $path=$disk->put('user', $file);
            // if($oldname){
            //     $disk->delete('user/'.$oldname);
            // }
            // $name=Str::after($path, 'user/'); 
            $image_name=$file->getClientOriginalName();
            $name= Str::random(4)."_".$image_name;
            while(file_exists("upload/sanpham/".$name))
            {
                $name= Str::random(4)."_".$image_name;
            }
            $file->move("upload/sanpham",$name);
        }
        try {
            $img = Image::make(public_path("upload/sanpham/".$name))->resize(900,900);
            /* insert watermark at bottom-right corner with 10px offset */
            $img->insert(public_path('upload/other/logowt.png'), 'bottom-right', 15, 15,'width:20px');
            // $img->save(public_path("upload/other/wwabc.png"));
            $img->save(public_path("upload/sanpham/".$name));
            // if($path){
                $user->hinhAnh=$name;
                $user->save();
            // }
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($user,200,[],JSON_NUMERIC_CHECK);
    }
    public function changeQuyenncc(Request $request,$id){      
        try {
              $data_find=tbl_nhacungcap::find($id);     
                //dd($request->only('trangThai')['trangThai']==7);
                    // if($request->only('trangThai')['trangThai']==7){
                    // $data_find->lockNccNotification();
                    // }
               $data_find->update($request->only('trangThai'));
               $idtk=$data_find['idTaiKhoan'];
               $taikhoan=tbl_taikhoan::find($idtk);
               $trangThaitk=$request->only('trangThaitk')['trangThaitk'];
               $quyen=$request->only('idQuyen')['idQuyen'];
               $taikhoan->update(['trangThai'=>$trangThaitk,'idQuyen'=>$quyen]);        
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
            tbl_nhacungcap::find($id)->delete();
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
