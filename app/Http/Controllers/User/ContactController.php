<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use Cart;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        return view("user.contact", compact("categories","cart","search_product"));
    }
}
