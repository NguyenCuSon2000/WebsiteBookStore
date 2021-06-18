<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Customers;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Illuminate\Support\Facades\Auth;
use Mail;

// use Section;
// session_start();

class CheckoutController extends Controller
{
    public function getFormPay(Request $request)
    {
       
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
                        ->selectRaw('sum(Quantity) as amount, ProductId')
                        ->orderBy('amount','desc')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.pay", compact("categories", "cart","product_pay","search_product","category_footer"));

    }

    public function postFormPay(Request $request)
    {
      
        $c_id = $request->txtid;
        $c_email = $request->txtEmail;
        $c_name = $request->txtName;
        $total = Cart::subtotal(0,3);
        $totalMoney = str_replace(",","",Cart::subtotal(0,3));
   
        if (Customers::where('email', $request->txtEmail)->exists()) {
            $customer_id = Customers::where("Email", $request->txtEmail)->value('id');
            if ($customer_id) {
                $order_id = Orders::insertGetId([
                'CustomerId' => $customer_id,
                'total' => (int)$totalMoney,
                'Note' => $request->txtNote,
                'OrderDate' => now(),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $request->txtad,
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
                        'AddDate' => now(),
                        'created_at' => now(),
                        'updated_at' => now()
                   ]);
               }
            }
        }
        else {
             $customer_id = Customers::insertGetId([
                "UserId" => $c_id,
                "CustomerName" => $request->txtName,
                "DateOfBirth" => $request->txtDate,
                "Address" => $request->txtad,
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
                'OrderDate' => now(),
                'ShipPhone' => $request->txtPhone,
                'ShipAddress' => $request->txtad,
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
                        'AddDate' => now(),
                        'created_at' => now(),
                        'updated_at' => now()
                   ]);
               }
            }
        }

        $to_name = "NGUYEN CU SON";
        $to_email = "son2kcntt@gmail.com";//
        Mail::send('user.send_mail', [
            'order_date' => now(),
            'c_email' => $c_email,
            'c_name' => $c_name,
            'c_address' => $request->txtad,
            'c_phone' => $request->txtPhone,
            'cart' => $cart,
            'total' => $total,
        ], function ($message) use($c_email, $to_name, $to_email){
            $message->from($to_email, $to_name);
            $message->to($c_email);
            $message->subject('THÔNG TIN ĐƠN ĐẶT HÀNG');
        });
        Cart::destroy();
        return redirect()->route("checkout_success")->with("success","Đặt hàng thành công");

      
    }

    public function success(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
                                    ->selectRaw('sum(Quantity) as amount, ProductId')
                                    ->orderBy('amount','desc')->limit(10)->get();
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
   
}
