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
        // $product_pay = OrderDetails::groupBy("ProductId","id")
        //             ->selectRaw('*, sum("Quantity") as amount')
        //             ->orderBy("amount","desc")
        //             ->paginate(10);
        $product_pay = OrderDetails::groupBy('ProductId')
                    ->selectRaw('sum(Quantity) as amount, ProductId')
                    ->orderBy('amount','desc')->paginate(10);
        // $product_pay = OrderDetails::groupBy('order_details.ProductId')
        //             ->selectRaw('sum(order_details.Quantity) as amount, order_details.ProductId')
        //             ->orderBy('amount','desc')
        //             ->paginate(10);
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                ->select(DB::raw('*, sum("Quantity") as amount'))
        //                ->groupBy('ProductId')
        //                ->paginate(10);
        return view("admin.statistic.product_pay", compact('product_pay'));
        
    }
 
    public function getComment()
    {
        $comment_count =  Comments::groupBy("ProductId","id")
                            ->selectRaw("*, count('id') as amount")
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
        // $order_highlight = Orders::groupBy("CustomerId", "id")
        //                 ->selectRaw('*, count(id) as amount, sum(total) as sum_total')
        //                 ->latest('amount')->latest('sum_total')->paginate(10);

        // if ($request->hight) {
        //     $hight = $request->hight;
        //     switch ($hight) {
        //         case 'qty':
        //             $order_highlight = Orders::groupBy("CustomerId","id")
        //                                 ->selectRaw('*, count(id) as amount, sum(total) as sum_total')
        //                                 ->latest('amount')->latest('sum_total')->paginate(10);
        //             break;
        //         case 'total':
        //             $order_highlight = Orders::groupBy("CustomerId","id")
        //                                 ->selectRaw('*, count(id) as amount, sum(total) as sum_total')
        //                                 ->latest('sum_total')->latest('amount')->paginate(10);
        //             break;
        //     }
        // }
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


    // CHI TIẾT ĐƠN HÀNG CỦA THÁNG
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

    // THỐNG KÊ THEO QUÝ
    public function getOrderQuarter(Request $request)
    {
        $list_total = array();
        for ($i = 1; $i < 5; $i++) { 
            $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)
                                ->where("Status", 1)->whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->sum('total');       
            array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
        }
        // dd($order_time);
        $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", now('Asia/Ho_Chi_Minh'))->sum("total");
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        if ($request->year) {
            $year = $request->year;
            switch ($year) {
                case '2021':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2022':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2023':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2024':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2025':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2026':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2027':
                     $list_total = array();
                     for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2028':
                $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2029':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
                case '2030':
                    $list_total = array();
                    for ($i = 1; $i < 5; $i++) { 
                        $order_time = Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
                        array_push($list_total, ['quarter'=> $i, "order_time" => $order_time]);
                    }
                    $order_total_year = Orders::where("Status",1)->whereYear("OrderDate", $year)->sum("total");
                    break;
            }
        }
        
        return view("admin.statistic.order_quarter ", ['order_total_year' => $order_total_year,'year' => $year, "list_total"=>$list_total]);
    }

    // BIỂU ĐỒ THỐNG KÊ THEO NGÀY THÁNG NĂM

    public function Revenue()
    {
        return view('admin.statistic.chart.revenue');
    }

    // TÌM KIẾM FROM DATE TO DATE
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Orders::groupBy(DB::raw('Date(OrderDate)'))
            ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
            ->where("Status",1)
            ->whereBetween('OrderDate',[$from_date, $to_date])
            ->orderBy('OrderDate','ASC')->get();

        foreach ($get as $key => $value) {
           
            $chart_data[] = array(
                'period' => Carbon::parse($value->OrderDate)->format('d/m/Y'),
                'order' => $value->total,
                'quantity' => $value->qty
            );
        }
        if (empty($chart_data)) {
            $chart_data[] = array(
                'period' => null,
                'order' => null,
                'quantity' => null
            );
        }
        echo $data = json_encode($chart_data);
    }

    // REVENUE TODAY
    public function getRevenueToday(Request $request)
    {
        $get = Orders::groupBy(DB::raw('Date(OrderDate)'))
                    ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                    ->where("Status",1)
                    ->whereDate('OrderDate', Carbon::today())
                    ->orderBy('OrderDate','ASC')->get();

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => Carbon::parse($value->OrderDate)->format('d/m/Y'),
                'order' => $value->total,
                'quantity' => $value->qty
            );
        }
        if (empty($chart_data)) {
            $chart_data[] = array(
                'period' => null,
                'order' => null,
                'quantity' => null
            );
        }
        echo $data = json_encode($chart_data);                          
    }

    // CHOOSE OPTION DATE
    public function getRevenueFilterDate(Request $request)
    {
        $data = $request->all();
         
        $homqua =  Carbon::now('Asia/Ho_Chi_Minh')->subDays()->toDateString();
        $sub7days =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub15days =  Carbon::now('Asia/Ho_Chi_Minh')->subDays(15)->toDateString();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

       switch ($data['filter_value']) {
        case 'homnay':
            $get = Orders::groupBy(DB::raw('Date(OrderDate)'))
                        ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                        ->where("Status",1)
                        ->whereDate('OrderDate',Carbon::today())
                        ->orderBy('OrderDate','ASC')->get();
            break;
        case 'homqua':
            $get =  Orders::groupBy(DB::raw('Date(OrderDate)'))
                        ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                        ->where("Status",1)
                        ->whereDate('OrderDate',$homqua)
                        ->orderBy('OrderDate','ASC')->get();
            break;
        case '7ngaytruoc':
            $get =  Orders::groupBy(DB::raw('Date(OrderDate)'))
                        ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                        ->where("Status",1)
                        ->whereBetween('OrderDate',[$sub7days, $now])
                        ->orderBy('OrderDate','ASC')->get();
            break;
        case '15ngaytruoc':
            $get =  Orders::groupBy(DB::raw('Date(OrderDate)'))
                        ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                        ->where("Status",1)
                        ->whereBetween('OrderDate',[$sub15days, $now])
                        ->orderBy('OrderDate','ASC')->get();
            break;
        default:
            $get = Orders::groupBy(DB::raw('Date(OrderDate)'))
                        ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                        ->where("Status",1)
                        ->whereBetween('OrderDate',[$sub30days, $now])
                        ->orderBy('OrderDate','ASC')->get();
            break;
        break;
       }

        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => Carbon::parse($value->OrderDate)->format('d/m/Y'),
                'order' => $value->total,
                'quantity' => $value->qty
            );
        }
        if (empty($chart_data)) {
            $chart_data[] = array(
                'period' => null,
                'order' => null,
                'quantity' => null
            );
        }
        echo $data = json_encode($chart_data);                          
    }

    // BIỂU ĐỒ THỐNG KÊ THEO THÁNG NĂM
    public function getOrderByMonthYear($month, $year)
    {
        $get = Orders::groupBy(DB::raw('Date(OrderDate)'))
                ->selectRaw('sum(total) as total, sum(TotalQuantity) as qty, Date(OrderDate) as OrderDate')
                ->where("status",1)->whereMonth("OrderDate", $month)
                ->whereYear("OrderDate", $year)
                ->orderBy('OrderDate','ASC')->get();
        return $get;
    }

    public function filter_by_month_year(Request $request)
    {
        $data = $request->all();

        $year = $data['year'];
        $month = $data['month'];

        switch ($year) {
            case '2019':
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2020':
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2021':
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2022': 
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2023': 
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2024': 
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            case '2025': 
                switch ($month) {
                    case '1':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '2':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '3':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '4':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '5':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '6': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '7': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '8':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '9':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '10':
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    case '11': 
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                    default:
                        $get = $this->getOrderByMonthYear($month, $year);
                        break;
                }
                break;
            default:
               
                break;
        }
        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => Carbon::parse($value->OrderDate)->format('d/m/Y'),
                'order' => $value->total,
                'quantity' => $value->qty
            );
        }
        if (empty($chart_data)) {
            $chart_data[] = array(
                'period' => null,
                'order' => null,
                'quantity' => null
            );
        }
        echo $data = json_encode($chart_data);
    }

    // BIỂU ĐỒ THỐNG KÊ THEO NĂM
    public function getOrderByYear($year)
    {
        $get = Orders::whereYear('OrderDate', $year)
                    ->where("Status",1)
                    ->select(DB::raw("MONTH(OrderDate) as month"),DB::raw("sum(total) as total"), DB::raw("sum(TotalQuantity) as qty"))
                    ->groupby('month')
                    ->orderBy('month','ASC')->get();
        return $get;
    }

    public function filter_by_year(Request $request)
    {
       $data = $request->all();

       $year = $data['year'];

       switch ($year) {
        case '2019':
            $get = $this->getOrderByYear($year);
            break;
        case '2020':
            $get = $this->getOrderByYear($year);
            break;
        case '2021':
            $get = $this->getOrderByYear($year);
            break;
        case '2022':
            $get = $this->getOrderByYear($year);
            break;
        case '2023':
            $get = $this->getOrderByYear($year);
            break;
        case '2024':
            $get = $this->getOrderByYear($year);
            break;
        case '2025':
            $get = $this->getOrderByYear($year);
            break;
        default:
            $get = $this->getOrderByYear($year);
            break;
       }

       
       foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => 'Tháng '.$value->month,
                'order' => $value->total,
                'quantity' => $value->qty
            );
        }
        if (empty($chart_data)) {
            $chart_data[] = array(
                'period' => null,
                'order' => null,
                'quantity' => null
            );
        }
        echo $data = json_encode($chart_data);
    }

    // BIỂU ĐỒ THỐNG KÊ THEO QUÝ
    public function getRevenueByQuater($year)
    {
        // Orders::where(DB::raw('QUARTER(OrderDate)'), $i)->where("Status", 1)->whereYear("OrderDate", $year)->sum('total');
        $get = Orders::whereYear('OrderDate', $year)
                    ->where("Status",1)
                    ->select(DB::raw("QUARTER(OrderDate) as quater"),DB::raw("sum(total) as total"), DB::raw("sum(TotalQuantity) as qty"))
                    ->groupby('quater')
                    ->orderBy('quater','ASC')->get();
        
        return $get;
    }

    public function filter_by_quater(Request $request)
    {
        $data = $request->all();

        $year = $data['year'];
 
        switch ($year) {
         case '2019':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2020':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2021':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2022':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2023':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2024':
             $get = $this->getRevenueByQuater($year);
             break;
         case '2025':
             $get = $this->getRevenueByQuater($year);
             break;
         default:
             $get = $this->getRevenueByQuater($year);
             break;
        }
 
        
        foreach ($get as $key => $value) {
             $chart_data[] = array(
                 'period' => 'Quý '.$value->quater,
                 'order' => $value->total,
                 'quantity' => $value->qty
             );
         }
         if (empty($chart_data)) {
             $chart_data[] = array(
                 'period' => null,
                 'order' => null,
                 'quantity' => null
             );
         }
         echo $data = json_encode($chart_data);
    }
}