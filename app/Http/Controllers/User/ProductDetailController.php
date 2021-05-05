<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;
use Cart;

class ProductDetailController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        $categories = CategoryProducts::all();

        $product = Products::find($id);

        $pictures = Products::find($id)->pictures;

        $products_new = Products::limit(6)->get();
        
        $cart = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        return view("user.product_detail", compact("categories", "product", "pictures", "products_new", "cart", "search_product"));
    }
}
