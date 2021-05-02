<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;

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
        $db = Orders::paginate(10);
        return view("admin.order.order", compact("db"));
    }

    public function show(Request $request, $id)
    {
        // if ($request->ajax()) {
        //     $order = OrderDetails::where("OrderId", $id)->get();
        //     $html = view('admin.order', compact('order'))->render();
        //    $html = view('admin.components.order', compact('order'))->render();
        //     return response()->json($html);
        // }
        $order_details = OrderDetails::where("OrderId", $id)->get();
        return view("admin.order.order_details", compact('order_details'));
       
    }

    public function destroy($id)
    {
        //
        $db = Orders::findOrFail($id);
        $db->delete();
        return redirect()->route("order.index")->with('message', 'Xóa đơn hàng thành công');
    }
}
