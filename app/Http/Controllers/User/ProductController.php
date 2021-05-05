<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use Cart;

class ProductController extends Controller
{
    //
    public function index($id,Request $request)
    {
        $categories = CategoryProducts::all();

        

        $products = Products::where("Cate_Id", $id)->paginate(9);

        $cart = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        // dd($products);
        return view("user.product", compact("categories","products","cart","search_product"));
    }
}
