<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_Details;
use App\Models\Orders;
use Cart;

class CheckoutController extends Controller
{
    //
    public function confirm_order(Request $request){
        $data = $request->all();
        
        $order = new Order;
        $order->CustomerId = Session::get('CustomerId');
        $order->OrderDate = $OrderDate;
        $order->ShippedDate = $ShippedDate;
        $order->ShipPhone = $ShipPhone;
        $order->ShipAddress = $ShipAddress;
        $order->Status = 1;
        $order->OrderId = $OrderId;
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();
        
        $cart= Cart::content();
        
        foreach($cart as $key){
            $order_details = new Order_Details;
            $order_details->OrderId = $OrderId;
            $order_details->ProductId = $cart['ProductId'];
            $order_details->UnitPrice = $cart['UnitPrice'];
            $order_details->Quantity = $cart['product_qty'];
            $order_details->AddDate= $cart['AddDate'];
            $order_details->save();
        }
        
    }
}
