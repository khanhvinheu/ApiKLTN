<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tbl_donhang;
use App\tbl_chitietdonhang;
use App\tbl_khuyenmai;
use App\tbl_chitietkhuyenmai;
use App\tbl_sanpham;
use DB;
use Carbon\Carbon;
use App\Notifications\SendMail;

class OderController extends Controller
{
    public function submitOrder(Request $request){       
		$cart = json_decode($request['cart']);
		DB::beginTransaction();
		try {
			//
            $order= tbl_donhang::create($request->only('NguoiNhan','DiaChi','DienThoai','idTaiKhoan','idPhuongthucTT','ngayDat','idTrangthai'));
            //
            foreach ($cart as $key => $value) {
				$idSanPham = $value->idSanPham;
				$qty = $value->SoLuong;
				while($qty > 0){
					$query = '
					SELECT 
                    tbl_sanphams."id",
                    tbl_sanphams."gia",
                    tbl_sanphams."soLuong" as "SLT"	,
                    tbl_chitietkhuyenmais."idKhuyenMai",
                    tbl_chitietkhuyenmais."NgayBD",
                    tbl_chitietkhuyenmais."NgayKT",
                    tbl_khuyenmais."chietKhau"
                    FROM tbl_sanphams	
                    LEFT JOIN tbl_chitietkhuyenmais
                    ON tbl_chitietkhuyenmais."id"=tbl_sanphams."idKhuyenmai"   
                    LEFT JOIN tbl_khuyenmais
                    ON tbl_khuyenmais."id"= tbl_chitietkhuyenmais."idKhuyenMai"    
					WHERE tbl_sanphams."id" = '.$idSanPham.'				
					LIMIT 1
					';
                    $result= DB::select($query)[0];
                    $dt = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();                
                    
                    $ngaybd=date('Y-m-d', strtotime($result->NgayBD));
                    $ngaykt=date('Y-m-d', strtotime($result->NgayKT));
                   
                    //dd($dt >= $ngaybd && $dt <= $ngaykt ,$dt,$result->NgayBD);
					if($result->SLT >= $qty) {                       
						$orderDetail			= 	new tbl_chitietdonhang;
		                $orderDetail->idDonHang	=   $order->id;
		                $orderDetail->idSanPham =   $result->id;		                
                        $orderDetail->soLuong	= 	$qty;
                        $orderDetail->donGia    =   $result->gia;
                        if($dt>=$ngaybd && $dt<=$ngaykt) {                            
                            $orderDetail->chietKhau =   (int)$result->chietKhau;  
                            $orderDetail->thanhTien =   ($result->gia* $qty)-((($result->gia*$qty)*(int)$result->chietKhau)/100);                        } 
                        else{
                            $orderDetail->chietKhau = 0;
                            $orderDetail->thanhTien =   ($result->gia* $qty);
                        }                 
                        	              
                        $orderDetail->save();  
                        
                        $product = tbl_sanpham::find($result->id);
                        $product -> update(['soLuong'=>$result->SLT-$qty]);                       

					}else{
						$orderDetail			= 	new tbl_chitietdonhang;
		                $orderDetail->idDonHang	=   (int)$order->id;
		                $orderDetail->idSanPham =   (int)$result->id;		                
                        $orderDetail->soLuong	= 	(int)$result->SLT;
                        $orderDetail->donGia    =   (int)$result->gia;	
                        	
                        if($dt>=$ngaybd && $dt<=$ngaykt) { 
                            $orderDetail->chietKhau =   (int)$result->chietKhau;                          
                            $orderDetail->thanhTien =   (int)($result->gia* $result->SLT)-((($result->gia*$result->SLT)*(int)$result->chietKhau)/100);	
                        } 
                        else{  
                            $orderDetail->chietKhau = 0;                          
                            $orderDetail->thanhTien =   (int)($result->gia* $result->SLT);	
                        } 
                                  
                        $orderDetail->save();
                        $product = tbl_sanpham::find($result->id);
                        $product -> update(['soLuong'=>$result->SLT-$qty]); 
                        $qty = 0;
					}
					 $qty -= (int)$result->SLT;
				}
			}
             $total = DB::select('select sum("thanhTien") from tbl_chitietdonhangs where "idDonHang" = '.$order->id.' group by "idDonHang"');
             //dd($total[0]->sum);
             $donhang=tbl_donhang::find($order->id);
             $phiShip=$request->phiShip;
             $tongTientra=$total[0]->sum+$phiShip;
             $donhang->update(['tongTien'=>$total[0]->sum,'phiShip'=>$phiShip,'tongtientra'=>$tongTientra]); 
             DB::commit();  
             return response()->json(['order'=>$order,'total' => $total,'ERROR'=>false],200);
           
        } catch (Exception $e) {
        	DB::rollBack();
            return response()->json($e,200,[],JSON_NUMERIC_CHECK);
        }
		
	}
	public function test(){
		$test =DB::select("delete from hoa_don_xuats where hoa_don_xuats.created_at > '2019/12/14'");
		return false;
	}
}
