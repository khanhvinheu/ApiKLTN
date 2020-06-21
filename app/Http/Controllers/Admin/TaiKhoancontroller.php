<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_taikhoan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TaiKhoancontroller extends Controller
{
    public function index()
    {
        $users=tbl_taikhoan::all();
        
        return response()->json($users, 200,[],JSON_NUMERIC_CHECK);
    }

    public function update(Request $request, $id)
    {
        $user=tbl_taikhoan::find($id);
        try {
            if($request->idDiaDiem!='null'){
                $user->update($request->only('idQuyen','hoTen','gioiTinh','dienThoai','ngaySinh','diaChi','hinh','trangThai'));
            }else{
                $user->update($request->only('idQuyen','hoTen','gioiTinh','dienThoai','ngaySinh','diaChi','hinh','trangThai'));
            }

        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($user,200,[],JSON_NUMERIC_CHECK);
    }
    public function changehinh(Request $request, $id)
    {
        $user=tbl_taikhoan::find($id);
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
            while(file_exists("upload/user/".$name))
            {
                $name= Str::random(4)."_".$image_name;
            }
            $file->move("upload/user",$name);
        }
        try {
            // if($path){
                $user->hinh=$name;
                $user->save();
            // }
        } catch (Exception $e) {
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json($user,200,[],JSON_NUMERIC_CHECK);
    }


    public function doimatkhau(Request $request)
    {

        $user=tbl_taikhoan::find($request->id);
        if (Auth::attempt(['id' => $request->id, 'password' => $request->old_password]))
        {
            try {
                Auth::logout();
                $user->password=Hash::make($request->password);
                $user->save();
            } catch (Exception $e) {
                return response()->json(['error'=>true],200,[],JSON_NUMERIC_CHECK);
            }
            return response()->json(['user'=>$user],200,[],JSON_NUMERIC_CHECK);
        }
        return response()->json(['error'=>true],200,[],JSON_NUMERIC_CHECK);
    }
}
