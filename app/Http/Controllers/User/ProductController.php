<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\OrderDetails;
use Cart;
use Auth;
use DB;


class ProductController extends Controller
{
    //
   
    public function index($id,Request $request)
    {
        $categories = CategoryProducts::all();
        
        // $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->limit(6)->get();
        $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(6);
        
        // $product_count = Products::groupBy('Cate_Id')                             // COUNT PRODUCT
        //                             ->selectRaw('count(id) as count, Cate_Id')
        //                             ->get();
        $product_count = Products::select("Cate_Id", DB::raw("count(id) as count"))
                        ->groupBy("Cate_Id")->get();
        // $product_count = DB::table("products")
        //                 ->select("Cate_Id", DB::raw("count(id) as count"))
        //                 ->groupBy("Cate_Id")->g‌​et();
        
        $cart = Cart::content();
        
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
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
                    $products = Products::where("Cate_Id", $id)->paginate(3);
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->paginate(6);
                    break;
                case '9':
                    $products = Products::where("Cate_Id", $id)->paginate(9);
                    break;
                case '12':
                    $products = Products::where("Cate_Id", $id)->paginate(12);
                    break;
                case '15':
                    $products = Products::where("Cate_Id", $id)->paginate(15);
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->paginate(6);
            }
        } 
        
        //FILTER PRICE
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $products = Products::where("Cate_Id", $id)->where('Price','<',50000)->paginate(12);
                    break;
                case '2':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [50000, 100000])->paginate(12);
                    break;
                case '3':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price', [100000, 200000])->paginate(12);
                    break;
                case '4':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[200000, 300000])->paginate(12);
                    break;
                case '5':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[300000, 400000])->paginate(12);
                    break;
                case '6':
                    $products = Products::where("Cate_Id", $id)->whereBetween('Price',[400000, 500000])->paginate(12);
                    break;
                case '7':
                    $products = Products::where("Cate_Id", $id)->where('Price','>',500000)->paginate(12);
                    break;
                    
            }
        } 
        

        //SORT PRODUCT 
        if ($request->orderby) {
            $orderby = $request->orderby;
            switch ($orderby) {
                case 'desc': // NEW
                    $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(12);
                    break;
                case 'asc':  //OLD
                    $products = Products::where("Cate_Id", $id)->orderBy('id','ASC')->paginate(12);
                    break;
                case 'price_max': // ascending
                      $products = Products::where("Cate_Id", $id)->orderBy('Price','ASC')->paginate(12);
                      break;
                case 'price_min': //decrease
                    $products = Products::where("Cate_Id", $id)->orderBy('Price','DESC')->paginate(12);
                    break;
                default:
                     $products = Products::where("Cate_Id", $id)->orderBy('id','DESC')->paginate(12);
                    
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
