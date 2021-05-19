<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CategoryProducts;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\OrderDetails;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SẢN PHẨM BÁN CHẠY NHẤT
        $product_pay = OrderDetails::groupBy('ProductId')
                                    ->selectRaw('sum(Quantity) as amount, ProductId')
                                    ->orderBy('amount','desc')->paginate(5);
        return view("admin.statistic.product_pay", compact('product_pay'));
                      
    }

    public function getOrder(Request $request)
    {
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();

        $date_from = $request->input("date_from");
        $date_to = $request->input("date_to");
        
        if ($date_from == "" || $date_to == "" || $date_from >= $date_to) {
            $order_pay = Orders::orderby("Status", "asc")->orderBy("id","desc")->paginate(5);
        }
        else {
            $order_pay = Orders::orderby("Status", "asc")->orderBy("id","desc")->whereBetween("OrderDate", [$date_from, $date_to])->get();
        }

        $order_total = Orders::sum('total');

        $order_total_date = Orders::whereBetween("OrderDate", [$date_from, $date_to])->sum('total');
        
        return view("admin.statistic.order_pay", 
               compact("order_done","order_wait",
                       "date_from","date_to",
                       "order_pay","order_total","order_total_date"));
    }


}