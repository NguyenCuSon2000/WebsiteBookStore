<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CategoryProducts;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Comments;
use App\Http\Requests\StatisticRequest;
use Carbon\Carbon;
use DB;

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
        // $product_pay = OrderDetails::groupBy('ProductId')
        //             ->selectRaw('sum(Quantity) as amount, ProductId')
        //             ->orderBy('amount','desc')->paginate(10);
        $product_pay = OrderDetails::orderBy('amount','desc')
                       ->select(DB::raw('sum(Quantity) as amount, ProductId'))
                       ->groupBy('ProductId')
                       ->paginate(10);
        return view("admin.statistic.product_pay", compact('product_pay'));
        
    }
    
    
    public function getComment()
    {
        $comment_count =  Comments::groupBy("ProductId")
        ->selectRaw('count(id) as amount, ProductId')
        ->latest("amount")->paginate(10);
        return view("admin.statistic.comment_count", compact("comment_count"));
    }
    
    // THỐNG KÊ ĐƠN HÀNG
    public function getOrder(Request $request)
    {
        $order_total = Orders::sum('total');
        $order_total_done = Orders::where("Status",1)->sum('total');
        $order_total_wait = Orders::where("Status",0)->sum('total');
        
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        
        if ($date_from >= $date_to) {
            $order_pay = Orders::orderby("Status", "asc")->orderBy("id","desc")->limit(5)->get();
        }
        else {
            $order_pay = Orders::orderby("Status", "asc")->orderBy("id","desc")->whereBetween("OrderDate", [$date_from, $date_to])->get();
        }
        
        $order_total_date = Orders::where("Status",1)->whereBetween("OrderDate", [$date_from, $date_to])->sum('total');
        
        return view("admin.statistic.order_pay", 
                    compact("order_total_done","order_total_wait",
                    "date_from","date_to",
                    "order_pay","order_total","order_total_date"));
    }
    
    // ĐƠN HÀNG NỔI NỔI BẬT
    public function getOrderHighlight(Request $request)
    {
        $order_highlight = Orders::groupBy("CustomerId")
                        ->selectRaw('count(id) as amount, sum(total) as sum_total, CustomerId')
                        ->latest('amount')->latest('sum_total')->paginate(10);
        if ($request->hight) {
            $hight = $request->hight;
            switch ($hight) {
                case 'qty':
                    $order_highlight = Orders::groupBy("CustomerId")
                                        ->selectRaw('count(id) as amount, sum(total) as sum_total, CustomerId')
                                        ->latest('amount')->latest('sum_total')->paginate(10);
                    break;
                case 'total':
                    $order_highlight = Orders::groupBy("CustomerId")
                                        ->selectRaw('count(id) as amount, sum(total) as sum_total, CustomerId')
                                        ->latest('sum_total')->latest('amount')->paginate(10);
                    break;
            }
        }
        return view("admin.statistic.order_highlight", compact('order_highlight'));
    }

    //SỐ LƯỢNG ĐƠN HÀNG
    public function getOrderCount(Request $request)
    {
        $list_count = array();
        for ($i = 1; $i < 13; $i++) { 
            $order_count = Orders::whereMonth("OrderDate", $i)
                           ->whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->count("id");
            array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
        }
        $order_quantity_year = Orders::whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->count('id');
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        if ($request->year) {
            $year = $request->year;
            switch ($year) {
                case '2021':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2022':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2023':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2024':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2025':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2026':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2027':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2028':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2029':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
                case '2030':
                    $list_count = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_count = Orders::whereMonth("OrderDate", $i)
                                     ->whereYear("OrderDate", $year)->count("id");
                        array_push($list_count, ['month'=> $i, "order_count" => $order_count]);
                    }
                    $order_quantity_year = Orders::whereYear("OrderDate", $year)->count('id');
                    break;
            }
        }
        return view("admin.statistic.order_count", ['order_quantity_year' => $order_quantity_year,'year' => $year, "list_count"=>$list_count]);
    }
    
    // DOANH THU THEO THÁNG
    public function getOrderTime(Request $request)
    {
        $list_total = array();
        for ($i = 1; $i < 13; $i++) { 
            $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                                ->whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->sum("total");
            array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
        }

        $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->sum("total");
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;

        if ($request->year) {
            $year = $request->year;
            switch ($year) {
                case '2021':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2022':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2023':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2024':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2025':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2026':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2027':
                     $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2028':
                $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2029':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2030':
                    $list_total = array();
                    for ($i = 1; $i < 13; $i++) { 
                        $order_time = Orders::where("Status",1)->whereMonth("OrderDate", $i)
                        ->whereYear("OrderDate", $year)->sum("total");
                        array_push($list_total, ['month'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
            }
        }
        
        return view("admin.statistic.order_time", ['order_total_year' => $order_total_year,'year' => $year, "list_total"=>$list_total]);
    }


    public function getListOrderTime(Request $request, $month, $year)
    {
        $order_total_year = Orders::where("Status",1)->whereMonth("OrderDate", $month)
                             ->whereYear("OrderDate", $year)->sum("total");
        $order_qty_year = Orders::whereMonth("OrderDate", $month)
                             ->whereYear("OrderDate", $year)->count("id");
        $order_list = Orders::whereMonth("OrderDate", $month)
                        ->whereYear("OrderDate", $year)
                        ->orderBy("Status",'asc')->orderBy("id",'desc')->paginate(5);
        return view("admin.statistic.list_order_month", ['order_total_year' => $order_total_year,'order_qty_year' => $order_qty_year,'month' => $month,'year'=>$year,'order_list' => $order_list]);
    } 


}