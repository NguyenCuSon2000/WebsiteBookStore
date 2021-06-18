<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Contact;
use App\Models\OrderDetails;
use Cart;

class ContactController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = CategoryProducts::all();
        $cart = Cart::content();
        $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
                        ->selectRaw('sum(Quantity) as amount, ProductId')
                        ->orderBy('amount','desc')->limit(10)->get();
        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();

        return view("user.contact", compact("categories","cart","product_pay","search_product","category_footer"));
    }

    public function saveContact(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = $data['updated_at'] = now();
        Contact::insert($data);
        return redirect()->back();
    }
}
