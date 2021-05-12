<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\OrderDetails;
use Cart;

class ProductController extends Controller
{
    //
    public function index($id,Request $request)
    {
        $categories = CategoryProducts::all();
        
        $products = Products::where("Cate_Id", $id)->paginate(6);
        
        $product_count = Products::groupBy('Cate_Id')                             // COUNT PRODUCT
        ->selectRaw('count(id) as count, Cate_Id')
        ->get();
        
        
        $cart = Cart::content();
        
        $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
        ->selectRaw('sum(Quantity) as amount, ProductId')
        ->orderBy('amount','desc')->limit(10)->get();
        
        // SEARCH 
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        
        //FILTER PRICE
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products = Products::where("Cate_Id", $id)->where('Price','<',50000)->paginate(6);
                    break;
                case '2':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [50000, 100000])->paginate(6);
                    break;
                case '3':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 200000])->paginate(6);
                    break;
                case '4':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[200000, 300000])->paginate(6);
                    break;
                case '5':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[300000, 400000])->paginate(6);
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[400000, 500000])->paginate(6);
                case '7':
                    $products = Products::where("Cate_Id", $id)->where('Price','>',500000)->paginate(6);
                    
            }
        } 
        

        //SORT PRODUCT 
        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'desc': // NEW
                    $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(6);
                    break;
                case 'asc':  //OLD
                    $products = Products::where("Cate_Id", $id)->orderBy('id','ASC')->paginate(6);
                    break;
                case 'price_max': // ascending
                      $products = Products::where("Cate_Id", $id)->orderBy('Price','ASC')->paginate(6);
                      break;
                case 'price_min': //decrease
                    $products = Products::where("Cate_Id", $id)->orderBy('Price','DESC')->paginate(6);
                    break;
                
                default:
                     $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(6);
                    
            }
        }

        // dd($products);
        return view("user.product", compact("categories","products","cart","product_count","product_pay","search_product"));
    }
}
