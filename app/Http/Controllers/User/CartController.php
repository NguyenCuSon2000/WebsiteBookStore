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
    public function index(Request $request)
    {
        //
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        return view("user.shopcart", compact("categories", "cart","search_product"));
    }

    public function addCart($id, Request $request){
        $product = Products::find($id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        $price = $product->Price;
        $cart = ['id' => $id, 'name' => $product->ProductName,"qty"=>$qty , "weight"=>10, 'price' => $price, 'options' => ['img' => $product->Picture,"category"=>$product->category->CategoryName]];
        Cart::add($cart);
        // dd(Cart::content());
        return redirect()->route('index')->with('message','Đã mua '.$product->ProductName.' thành công');
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
}
