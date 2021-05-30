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
        
        $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->limit(6)->get();
        
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


        //DISPLAY PRODUCT
        if ($request->display) {
            $display = $request->display;
            switch ($display) {
                case '3':
                    $products = Products::where("Cate_Id", $id)->limit(3)->get();
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->limit(6)->get();
                    break;
                case '9':
                    $products = Products::where("Cate_Id", $id)->limit(9)->get();
                    break;
                case '12':
                    $products = Products::where("Cate_Id", $id)->limit(12)->get();
                    break;
                case '15':
                    $products = Products::where("Cate_Id", $id)->limit(15)->get();
                    break;
                case 'all':
                    $products = Products::where("Cate_Id", $id)->get();
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->limit(9)->get();
            }
        } 
        
        //FILTER PRICE
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products = Products::where("Cate_Id", $id)->where('Price','<',50000)->get();
                    break;
                case '2':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [50000, 100000])->get();
                    break;
                case '3':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 200000])->get();
                    break;
                case '4':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[200000, 300000])->get();
                    break;
                case '5':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[300000, 400000])->get();
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[400000, 500000])->get();
                case '7':
                    $products = Products::where("Cate_Id", $id)->where('Price','>',500000)->get();
                    
            }
        } 
        

        //SORT PRODUCT 
        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'desc': // NEW
                    $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->get();
                    break;
                case 'asc':  //OLD
                    $products = Products::where("Cate_Id", $id)->orderBy('id','ASC')->get();
                    break;
                case 'price_max': // ascending
                      $products = Products::where("Cate_Id", $id)->orderBy('Price','ASC')->get();
                      break;
                case 'price_min': //decrease
                    $products = Products::where("Cate_Id", $id)->orderBy('Price','DESC')->get();
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->get();
                    
            }
        }

        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        // dd($products);
        return view("user.product", 
                compact("categories",
                        "products",
                        "cart",
                        "product_count",
                        "product_pay",
                        "search_product",
                        "category_footer"));
    }
}
