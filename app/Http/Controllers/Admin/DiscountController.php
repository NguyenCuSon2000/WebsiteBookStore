<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Products;
use App\Http\Requests\DiscountRequest;
use Carbon\Carbon;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Discount::orderBy("id","DESC")->paginate(10);
        return view("admin.discount.discount", compact("db"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $db = Products::all();
        return view("admin.discount.add_discount", ["db"=>$db]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        //
        $discount = new Discount();
        $discount->Product_Id = $request->txtProId;
        $discount->Percent = $request->txtPer;
        $discount->BeginDate = $request->txtBegin;
        $discount->EndDate = $request->txtEnd;
        $discount->AddDate = now('Asia/Ho_Chi_Minh');
        $discount->Status = $request->sl_stt;
        $discount->save();

        return redirect()->route("discount.index")->with('message', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            return redirect()->route("discount.index");
        }
        else {
            $db = Discount::find($id);
            $products = Products::all();
            return view("admin.discount.edit_discount",compact("db","products"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        //
        $db = Discount::find($id);
        $db->Product_Id = $request->input('txtProId');
        $db->Percent = $request->input('txtPer');
        $db->BeginDate = $request->input('txtBegin');
        $db->EndDate = $request->input('txtEnd');
        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("discount.index", [$id])->with('message', 'Cập nhật sản phẩm thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $db = Discount::findOrFail($id);
        $db->delete();
        return redirect()->route("discount.index")->with('message', 'Xóa sản phẩm thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Discount::paginate(10);
        }
        else {
            $db = Discount::join('products', 'discounts.Product_Id','=','products.id')
                            ->select('discounts.*')
                            ->where('discounts.id','LIKE','%'.$text.'%')
                            ->orWhere('discounts.Percent','LIKE','%'.$text.'%')
                            ->orWhere('discounts.BeginDate','LIKE','%'.$text.'%')
                            ->orWhere('discounts.EndDate','LIKE','%'.$text.'%')
                            ->orWhere('discounts.AddDate','LIKE','%'.$text.'%')
                            ->orWhere('products.ProductName','LIKE','%'.$text.'%')
                            ->orWhere('products.Price','LIKE','%'.$text.'%')
                            ->paginate(1000);
        }
        return view('admin.discount.discount', ['db'=>$db]);
    }
}
