<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Helpers;
use App\Models\Products;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Discount;
use Cart;
use DB;
use Section;
// session_start();

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
        // $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
        //             ->selectRaw('sum(Quantity) as amount, ProductId')
        //             ->orderBy('amount','desc')->limit(10)->get();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //             ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //             ->groupBy('ProductId')
        //             ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();         
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.shopcart", compact("categories", "cart","product_pay","search_product","category_footer"));
    }
    
    public function addCart($id, Request $request){
        $product = Products::find($id);
        $discount = Products::find($id)->discounts;
        
        if($request->txtQty){
            $qty = $request->txtQty;
        }else{
            $qty = 1;
        }
        
        $price = $product->Price;
        
        foreach($discount as $item){
            if ($item->Percent && $item->Status == 1) {
                $price = $price * (100 - $item->Percent)/100;
            }
        }
        
        $cart = [
            'id' => $id, 
            'name' => $product->ProductName,
            "qty"=>$qty , 
            "weight"=>10, 
            'price' => $price, 
            'options' => [
                'img' => $product->Picture,
                "category"=>$product->category->CategoryName,
                "price_old" => $product->Price 
                ]
            ];
            Cart::add($cart);
            // dd(Cart::content());
            return redirect()->back()->with('message','Đã mua '.$product->ProductName.' thành công');
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
        
        
    }
    