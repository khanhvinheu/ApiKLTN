<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
       // dd($request->input('amount') * 100);
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "V1XR1WSD"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BGMAPJJIHTBDAKFMIIYOCOQPGHCUGNBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Returnurl = "http://localhost:8000/api/admin/return-vnpay";
        $vnp_Returnurl = "http://localhost:4200/return-pament";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        //return redirect($vnp_Url);
        $result = array(   
            'status' => 'OK',
            'message'=> 'Fetch Successfully',         
            'data'=> $vnp_Url
        );
        return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
    }
    public function return(Request $request)
    {
        $url = session('url_prev','/');
        //dd($request->vnp_ResponseCode == "00");
        if($request->vnp_ResponseCode == "00") {
            //$this->apSer->thanhtoanonline(session('cost_id'));
            //return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
            $result = array(   
                'status' => 'OK',
                'message'=> 'Đã thanh toán phí dịch vụ',         
               
            );
            return response()->json($result,Response::HTTP_OK,[],JSON_NUMERIC_CHECK);
        }
        else{
            session()->forget('url_prev');
            //return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
            $result = array(
                'status' => 'ER',
                'message'=> 'Lỗi trong quá trình thanh toán phí dịch vụ',
               
            );
            return response()->json($result,Response::HTTP_BAD_REQUEST,[],JSON_NUMERIC_CHECK);
        }
    }
}
