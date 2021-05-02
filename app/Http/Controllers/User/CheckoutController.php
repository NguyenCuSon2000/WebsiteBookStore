<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Customers;
use Cart;
use Illuminate\Support\Facades\Auth;
use Section;
session_start();

class CheckoutController extends Controller
{
    //
   
   
    public function getFormPay(Request $request)
    {
       
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        return view("user.pay", compact("categories", "cart","search_product"));

    }

    public function postFormPay(Request $request)
    {
   
        // if ( $order = Orders::create([
        //     "CustomerId" => $c_id,
        //     "OrderDate" => now(),
        //     // "ShippedDate" => ,
        //     "ShipPhone" => $request->txtPhone,
        //     "ShipAddress" => $request->txtad,
        //     "Status" => 1
        // ]) ) {
        //    $orderdetails_id = $order->id;
        //    foreach ($cart as $id => $item) {

        //        $quantity = $item['qty'];
        //        $price = $item['price'];

        //        Order_Details::create([
        //             "OrderId" => $orderdetails_id,
        //             "ProductId" => $id,
        //             "Quantity" => $quantity,
        //             "UnitPrice" => $price,
        //             "AddDate" => now()
        //        ]);
        //    }

        //    session(['cart' => '']);

        //    return redirect()->route("checkout_success")->with("success","Đặt hàng thành công");
        // }
        // else{
        //    return redirect()->back()->with("error","Đặt hàng không thành công");
        // }
        $c_id = $request->txtid;
        $totalMoney = str_replace(",","",Cart::subtotal(0,3));

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
            'Status' => 1,
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
       
        Cart::destroy();
        return redirect()->route("checkout_success")->with("success","Đặt hàng thành công");

      
    }

    public function success(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
       return view("user.checkout_success", compact("categories", "cart","search_product"));
    }
   
}
