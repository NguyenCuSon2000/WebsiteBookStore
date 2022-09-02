<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\OrderDetails;
use App\Models\Customers;
use PDF;
use Carbon;

class OrdersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $db = Orders::orderby("Status", "asc")->orderBy("id","desc")->paginate(5);
        $count_order = Orders::count();
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();
        $order_count_today = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->count();
        return view("admin.order.order", compact("db","count_order","order_done","order_wait","order_count_today"));
    }
    
    public function show(Request $request, $id)
    {
        $order_customer =  OrderDetails::where("OrderId", $id)->limit(1)->get();
        $order_details = OrderDetails::where("OrderId", $id)->paginate(5);
        return view("admin.order.order_details", compact('order_customer','order_details'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //
      
        if ($id==null) {
            return redirect()->route("order.index");
        }
        else {
            $db = Orders::find($id);
            $customers = Customers::all();
            return view("admin.order.edit_order",compact("db","customers"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $db = Orders::find($id);
        $db->CustomerId = $request->input('cus_id');
        $db->OrderDate = $request->input('txtDate');
        $db->ShipPhone = $request->input('txtPhone');
        $db->ShipAddress = $request->input('txtAd');
        $db->total = $request->input('txtTotal');
        $db->Note = $request->input('txtNote');
        $db->Status = $request->input('sl_stt');
       
        $db->save();
        return redirect()->route("order.index", [$id])->with('message', 'Cập nhật hóa đon thành công');

    }

    
    public function destroy($id)
    {
        //
        $db = Orders::findOrFail($id);
        if($db->Status == 0){
            $order_details = OrderDetails::where("OrderId", $id)->get();
            foreach ($order_details as $a) {
                $product = Products::find($a->ProductId);
                $product->Quantity = $product->Quantity + $a->Quantity;
                $product->save();
            }   
        }
        $db->delete();
        return redirect()->route("order.index")->with('message', 'Xóa đơn hàng thành công');
    }

    public function search(Request $request)
    {
        //
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();
        $count_order = Orders::count();
        $order_count_today = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->count();
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Orders::orderby("Status", "asc")->orderBy("id","desc")->paginate(5);
        }
        else {
            $db = Orders::join('customers','orders.CustomerId','=','customers.id')
                            ->select("orders.*")
                            ->where('orders.OrderDate','LIKE','%'.$text.'%')
                            ->orWhere('orders.id','LIKE','%'.$text.'%')
                            ->orWhere('orders.ShipPhone','LIKE','%'.$text.'%')
                            ->orWhere('orders.ShipAddress','LIKE','%'.$text.'%')
                            ->orWhere('orders.Note','LIKE','%'.$text.'%')
                            ->orWhere('customers.CustomerName','LIKE','%'.$text.'%')->paginate(10000);
        }
        // dd($db);
        return view('admin.order.order', compact("db","order_done","order_wait","count_order","order_count_today"));
    }

    public function getOrderCurrent()
    {
        $db = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->orderBy("Status","asc")->orderBy("id","desc")->paginate(5);
        $count_order = Orders::count();
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();
        $order_count_today = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->count();
        return view("admin.order.order", compact("db","count_order","order_done","order_wait","order_count_today"));
    }

    public function getOrderDone()
    {
        $db = Orders::where("Status", 1)->orderBy("id","desc")->paginate(5);
        $count_order = Orders::count();
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();
        $order_count_today = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->count();
        return view("admin.order.order", compact("db","count_order","order_done","order_wait","order_count_today"));
    }

    public function getOrderWait()
    {
        $db = Orders::where("Status", 0)->orderBy("id","desc")->paginate(5);
        $count_order = Orders::count();
        $order_done = Orders::where("Status",1)->count();
        $order_wait = Orders::where("Status",0)->count();
        $order_count_today = Orders::whereDate("OrderDate", now('Asia/Ho_Chi_Minh'))->count();
        return view("admin.order.order", compact("db","count_order","order_done","order_wait","order_count_today"));
    }
    
    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    
    public function print_order_convert($checkout_code)
    {
        $order_details = OrderDetails::where("OrderId", $checkout_code)->get();
        $order = Orders::where("id", $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->CustomerId;
        }
        $customer = Customers::where('id',$customer_id)->first();

        $order_details_product = OrderDetails::with("product")->where("OrderId",$checkout_code)->get();

        $output = '';

        $output.='
        <style>
            h1 {
                text-align: center;
            }
            body { 
                font-family: DejaVu Sans;
            }
            .table-styling {
                width: 100%;
            }
            .table-styling.customer tr td{
                text-align: left;
            }
            .table-styling.product tr td.amount {
                text-align: center;
            }
            .table-styling.product tr td.price {
                text-align: right;
                color: red;
            }
        </style>
        <h1>Cửa hàng bán sách Book Store</h1>
        
        <p>Ngày đặt: '.\Carbon\Carbon::parse($ord->OrderDate)->format('d/m/Y') .'</p>
        <p>Người đặt hàng</p>
        <table class="table-styling customer" border=1 cellpadding=3 cellspacing=2>
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>';
              
        $output.='
                    <tr>
                        <td>'.$customer->CustomerName.'</td>
                        <td>'.$customer->Phone.'</td>
                        <td>'.$customer->Email.'</td>
                        <td>'.$customer->Address.'</td>
                    </tr>';
           
        $output.='
                </tbody>
        </table>


        <p>Đơn hàng đặt</p>
        <table class="table-styling product" border=1 cellpadding=3 cellspacing=2>
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá (VNĐ)</th>
                        <th>Thành tiền (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>';
                $total = 0;
              foreach ($order_details_product as $key => $pro) {
                  $subtotal = $pro->Quantity*$pro->UnitPrice;
                  $total+=$subtotal;
        $output.='
                    <tr>
                        <td>'.$pro->product->ProductName.'</td>
                        <td class="amount">'.$pro->Quantity.'</td>
                        <td class="price">'. number_format($pro->UnitPrice,0,',','.').'</td>
                        <td class="price">'. number_format($subtotal,0,',','.').'</td>
                    </tr>';
              }
        $output.= '
        <tr>
              <td>Thanh toán</td> 
              <td></td> 
              <td></td>
              <td class="price">
                <p>'. number_format($total,0,',','.').'</p>
              </td>
        </tr>';
        $output.='
                </tbody>
        </table>
        
        <p>Ký tên</p>
        <table width="100%">
              <thead>
                    <tr>
                        <th width="200px">Người lập phiếu</th>
                        <th width="800px">Người nhận</th>
                    </tr>
              </thead>
        </table>
        
        ';


        return $output;

    }
    
}
