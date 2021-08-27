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
use DB;

class ProductDetailController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        $categories = CategoryProducts::all();

        $product = Products::find($id);

        $pictures = Products::find($id)->pictures;

        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();             
        $cart = Cart::content();

        $keywords = $request->txtSearch;
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        $comments = Products::find($id)->comments;
        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
        return view("user.product_detail", 
                   compact("categories", 
                           "product",
                           "pictures", 
                           "product_pay",
                           "cart", 
                           "search_product",
                            "comments",
                            "category_footer"));
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
