<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\User;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\AuthLogin;
use Section;
// session_start();

class CheckoutController extends Controller
{

    public function  get_login_order()
    {
        return view('user.login_order');
    }

  /**
   * If the username and password are correct, then the user is redirected to the checkout page
   * 
   * @param AuthLogin request The request object.
   */
    public function login_order(AuthLogin $request)
    {
        // $username = $request->username;
        // $ps = User::where("username", $request->username)->value('password');
        // $password = Hash::check($request->password, $ps);
        // $result = User::where('username', $username)->first();      
        // if(($result == true) && ($password == true)){
        //     Session::put('user_id', $result->id);
        //     Session::put('username', $result->username);
        //     Session::put('email', $result->email);
        //     return redirect()->route('checkout');
        // }
        // else{
        //     Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
        //     return redirect()->route('get_login_order');
        // }
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt([
            'username' => $username, 
            'password' => $password
            ])) {
            $user = User::where('username', $username)->first();
            Auth::login($user);
            return redirect()->route('checkout');
        }
        else {
            return redirect()->route('get_login_order')->with('msg', 'Đăng nhập thất bại');
        }
    }

    public function logout_checkout()
    {
        // Session::flush();
        Auth::logout();
        return redirect()->route('get_login_order');
    }
    
    public function getFormPay(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();


        $provinces = Province::all();


        return view("user.pay", compact("categories", "cart","product_pay","search_product","category_footer", "provinces"));

    }


    public function getDistrictByProvince($province_id)
    {
        $districts = District::where("province_id", (integer)$province_id)->get();
        return response()->json($districts);
    }

    public function getWardByDistrict($district_id)
    {
        $wards = Ward::where("district_id", (integer)$district_id)->get();
        return response()->json($wards);
    }

    /**
     * I want to send an email to the customer when they have successfully placed an order
     * 
     * @param Request request The request object.
     * 
     * @return The return value of the last statement executed in the function.
     */
    public function postFormPay(Request $request)
    {
        $c_id = $request->txtid;
        $c_email = $request->txtEmail;
        $c_name = $request->txtName;
        $total = Cart::subtotal(0,3);
        $totalQuantity = Cart::count();
        $address = $request->txtad.' - '.$request->ward.' - '.$request->district.' - '.$request->province;
        $totalMoney = str_replace(",","",Cart::subtotal(0,3));

        if (Customers::where('Email', $request->txtEmail)->exists()) {
            $customer_id = Customers::where("Email", $request->txtEmail)->value('id');
            if ($customer_id) {
                $order_id = Orders::insertGetId([
                'CustomerId' => $customer_id,
                'TotalQuantity' => (int)$totalQuantity,
                'total' => (int)$totalMoney,
                'Note' => $request->txtNote,
                'OrderDate' => now('Asia/Ho_Chi_Minh'),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $address,
                'Status' => 0,
                'created_at' => now(),
                'updated_at' => now()
                ]);
            }
            if ($order_id) {
                $cart = Cart::content();
                foreach ($cart as $key => $value) {
                    OrderDetails::insert([
                        'OrderId' => $order_id,
                        'ProductId' => $value->id,
                        'Quantity' => $value->qty,
                        'UnitPrice' => $value->price,
                        'AddDate' => now('Asia/Ho_Chi_Minh'),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
                $order_details = OrderDetails::where("OrderId", $order_id)->get();
                foreach ($order_details as $a) {
                    $product = Products::find($a->ProductId);
                    $product->Quantity = $product->Quantity - $a->Quantity;
                    $product->save();
                }     
            }
        }
        else {
             $customer_id = Customers::insertGetId([
                "UserId" => $c_id,
                "CustomerName" => $request->txtName,
                "DateOfBirth" => $request->txtDate,
                "Address" => $address,
                "Phone" => $request->txtPhone,
                "Email" => $request->txtEmail,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            if ($customer_id) {
                $order_id = Orders::insertGetId([
                'CustomerId' => $customer_id,
                'total' => (int)$totalMoney,
                'Note' => $request->txtNote,
                'OrderDate' => now('Asia/Ho_Chi_Minh'),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $address,
                'Status' => 0,
                'created_at' => now(),
                'updated_at' => now()  
                ]);           
            }
          
            if ($order_id) {
               $cart = Cart::content();
               foreach ($cart as $key => $value) {
                   OrderDetails::insert([
                        'OrderId' => $order_id,
                        'ProductId' => $value->id,
                        'Quantity' => $value->qty,
                        'UnitPrice' => $value->price,
                        'AddDate' => now('Asia/Ho_Chi_Minh'),
                        'created_at' => now(),
                        'updated_at' => now()
                   ]);
               }
               $order_details = OrderDetails::where("OrderId", $order_id)->get();
               foreach ($order_details as $a) {
                   $product = Products::find($a->ProductId);
                   $product->Quantity = $product->Quantity - $a->Quantity;
                   $product->save();
                }   
            }
        }

        // $to_name = "NGUYEN CU SON";
        // $to_email = "son2kcntt@gmail.com";//
        // Mail::send('user.send_mail', [
        //     'order_date' => now('Asia/Ho_Chi_Minh'),
        //     'c_email' => $c_email,
        //     'c_name' => $c_name,
        //     'c_address' => $request->txtad,
        //     'c_phone' => $request->txtPhone,
        //     'cart' => $cart,
        //     'total' => $total,
        // ], function ($message) use($c_email, $to_name, $to_email){
        //     $message->from($to_email, $to_name);
        //     $message->to($c_email);
        //     $message->subject('THÔNG TIN ĐƠN ĐẶT HÀNG');
        // });

        Cart::destroy();
        return redirect()->route("checkout_success")->with("success","Đặt hàng thành công");

      
    }


    public function vnpay_payment()
    {
        $vnp_TmnCode = "N2H93AMC"; //Website ID in VNPAY System
        $vnp_HashSecret = "OGKERJOXIQLUUTSKXDEBWELBTYLKZEBL"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/checkout_success";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

        $vnp_TxnRef = '12345678'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thông tin đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
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
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);

            die();
        } else {
            echo json_encode($returnData);
        }

    }

    public function success(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
       return view("user.checkout_success", compact("categories", "cart","product_pay","search_product","category_footer"));
    }

    public function history(Request $request)
    {
        $user_id = Auth::id();
        $customer = Customers::where("UserId", $user_id)->first();
        if ($customer) {
           $cus_id = $customer->id;
           $order_history = Orders::orderBy("OrderDate","DESC")->where('CustomerId', $cus_id)->get();
        }
        else {
            $order_history = Orders::orderBy("OrderDate","DESC")->where('CustomerId', null)->get();
        }
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view('user.history', compact("order_history","categories", "cart","product_pay","search_product","category_footer"));
    }

    public function history_order_detail(Request $request, $order_id)
    {
        $order_customer =  OrderDetails::where("OrderId", $order_id)->limit(1)->get();
        $order_detail = OrderDetails::where("OrderId", $order_id)->get();
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view('user.history_order_detail', compact("order_customer","order_detail","categories", "cart","product_pay","search_product","category_footer"));
    }
}
