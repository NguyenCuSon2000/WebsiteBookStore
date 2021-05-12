<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;
use App\Models\OrderDetails;
use App\Models\Comments;
use Cart;

class ProductDetailController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        $categories = CategoryProducts::all();

        $product = Products::find($id);

        $pictures = Products::find($id)->pictures;

        $product_pay = OrderDetails::groupBy('ProductId')
                                    ->selectRaw('SUM(Quantity) as amount, ProductId')
                                    ->orderBy('amount','desc')->get();
        
        $cart = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        $comments = Products::find($id)->comments;

        return view("user.product_detail", compact("categories", "product", "pictures", "product_pay", "cart", "search_product", "comments"));
    }

    public function saveComment(Request $request, $id)
    {
        $product = Products::find($id);
        $data = $request->except('_token');
        $data['created_at'] = $data['updated_at'] = now();
        Comments::insert($data);
        return redirect()->back();
    }

}
