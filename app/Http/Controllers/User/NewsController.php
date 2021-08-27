<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\OrderDetails;
use App\Models\News;
use Cart;
use DB;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        // $product_count = Products::groupBy('Cate_Id')                             // COUNT PRODUCT
        //                         ->selectRaw('count(id) as count, Cate_Id')
        //                         ->get();
        $product_count = Products::select("Cate_Id", DB::raw("count(id) as count"))
                                   ->groupBy("Cate_Id")->get();
        // $product_count = DB::table("products")
        //                 ->select("Cate_Id", DB::raw("count(id) as count"))
        //                 ->groupBy("Cate_Id")->g‌​et();
        $news = News::orderBy("id","DESC")->paginate(3);
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.new", 
                    compact("categories",
                            "cart",
                            "product_pay",
                            "search_product",
                            "product_count",
                            "news",
                            "category_footer"));
    }
    public function new_detail(Request $request, $id)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::orderBy('amount','desc')
                        ->select(DB::raw('sum(Quantity) as amount, ProductId'))
                        ->groupBy('ProductId')
                        ->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        // $product_count = Products::groupBy('Cate_Id')                             // COUNT PRODUCT
        //                         ->selectRaw('count(id) as count, Cate_Id')
        //                         ->get();
        $product_count = DB::table("products")
                        ->select("Cate_Id", DB::raw("count(id) as count"))
                        ->groupBy("Cate_Id")->g‌​et();

        $news = News::find($id);
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.new_detail", 
                    compact("categories",
                            "cart",
                            "product_pay",
                            "search_product",
                            "product_count",
                            "news",
                            "category_footer"));
    }
}
