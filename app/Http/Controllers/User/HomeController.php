<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;

class HomeController extends Controller
{
    public function index()
    {
        $categories = CategoryProducts::all();
        $products = Products::limit(20)->get();
        $products_sale = Discount::all();
        // $products = Products::limit(6)->get();
        // $products = Products::orderby("ProductName", "asc")->get();
        // $products = Products::whereBetween("Price", [25000, 100000])->limit(6)->get();
        return view("user.index", compact("categories", "products", "products_sale"));
    }
}
