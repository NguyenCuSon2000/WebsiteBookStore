<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use Cart;
use Section;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        return view("user.shopcart", compact("categories", "cart"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        //
        $rowId = $request->rowId_cart;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return redirect()->route("cart.index");
        // if($request->ajax()){
        //     if($request->qty == 0){
        //         return response()->json(['error' => 'Số lượng tối thiểu là 1 sản phẩm'],200);
        //     }else{
        //         Cart::update($id,$request->qty);
        //         return response()->json(['result' => 'Đã cập số lượng sản phẩm thành công']);
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //
        Cart::remove($rowId);
        return redirect()->route("cart.index")->with("message","Đã xóa sản phẩm trong giỏ hàng thành công");
    }

    public function addCart($id, Request $request){
        $product = Products::find($id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        $price = $product->Price;
        $cart = ['id' => $id, 'name' => $product->ProductName,"qty"=>$qty , "weight"=>10, 'price' => $price, 'options' => ['img' => $product->Picture]];
        Cart::add($cart);
        // dd(Cart::content());
        return redirect()->route('index')->with('message','Đã mua '.$product->ProductName.' thành công');
    }
}
