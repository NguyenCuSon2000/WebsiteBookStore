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
    public function index($id)
    {
        $categories = CategoryProducts::all();
        $products = Products::where("Cate_Id", $id)->paginate(9);
        $cart = Cart::content();
        // dd($products);
        return view("user.product", compact("categories","products","cart"));
    }
}
