<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use Cart;

class ContactController extends Controller
{
    //
    public function index()
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        return view("user.contact", compact("categories","cart"));
    }
}
