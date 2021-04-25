<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;
use Cart;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryProducts::all();
        $products = Products::limit(9)->get();
        $products_sale = Discount::all();
        $cart  = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
    //    dd($search_product);
        // $products = Products::limit(6)->get();
        // $products = Products::orderby("ProductName", "asc")->get();
        // $products = Products::whereBetween("Price", [25000, 100000])->limit(6)->get();
        return view("user.index", compact("categories", "products", "products_sale", "cart", "search_product"));
    }

    public function search(Request $request)
    {
      
       return view("user.index", compact("search_product"));
    }
}
