<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;

class ProductDetailController extends Controller
{
    //
    public function index($id)
    {
        $categories = CategoryProducts::all();
        $product = Products::find($id);
        return view("user.product_detail", compact("categories", "product"));
    }
}
