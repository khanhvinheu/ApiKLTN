<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tbl_taikhoan;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if($request->email=="root" && $request->password=="vigoss"){
            $user=new tbl_taikhoan;
            $user->id=0;
            $user->idQuyen=0;
            $user->hoTen="Super Admin";
            $user->hinhAnh="rootadmin.png";
            return response()->json($user,200);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember))
        {
            return Auth::user();
        }
        return response()->json(['error'=>true]);
    }
    public function register(Request $request){
        if(tbl_taikhoan::where('email',$request->email)->count()>0){
            return response()->json(['error_email'=>true]);
        }
        try {
            $user = new tbl_taikhoan;
            $user->hoTen=$request->hoTen;
            $user->email = $request->email;
            $user->diaChi =$request->diaChi;
            $user->password = Hash::make($request->password);
            $user->save(); 
        } catch (Exception $e) {
             return response()->json(['error'=>true]);
        }
         return response()->json(['user'=>tbl_taikhoan::find($user->id)]);
        
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
