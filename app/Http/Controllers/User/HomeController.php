<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Discount;
use App\Models\Picture;
use App\Models\OrderDetails;
use Cart;
use Mail;
use Auth;
use DB;

class HomeController extends Controller
{

    /**
     * Mail::send('user.send_mail',,function() use (,){
     *              ->to()->subject('Test thử mail nhé');//send this mail with subject
     *              ->from(,);//send from this mail
     *          });
     */
    public function send_mail()
    {
         //send mail
         $to_name = "NGUYEN CU SON";
         $to_email = "son2kcntt@gmail.com";//send to this email
 
         $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>"Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php
     
         Mail::send('user.send_mail',$data,function($message) use ($to_name,$to_email){
             $message->to($to_email)->subject('Test thử mail nhé');//send this mail with subject
             $message->from($to_email,$to_name);//send from this mail
         });
         //--send mail
        //  return redirect()->route('index')->with("message","");
    }
    public function index(Request $request)
    {
       
        $categories = CategoryProducts::all(); //LIST CATEGORY


        $products = Products::orderBy('id', 'DESC')->get();     //LIST PRODUCT
        $products_desc = Products::where('Cate_Id', 3)->orderBy('id', 'DESC')->limit(6)->get();     //LIST PRODUCT
        $product_asc = Products::where('Cate_Id', 12)->orderBy('id', 'DESC')->orderby("ProductName", "asc")->limit(6)->get();
        $product_bt= Products::where('Cate_Id', 11)->orderBy('id', 'DESC')->limit(6)->get();

        $products_sale = Discount::all(); // LIST DISCOUNT PRODUCT


        // $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
        //                 ->selectRaw('sum(Quantity) as amount, ProductId')
        //                 ->orderBy('amount','desc')->limit(10)->get();
        // $product_pay = OrderDetails::orderBy('amount','desc')
        //                 ->select(DB::raw('sum(Quantity) as amount, ProductId'))
        //                 ->groupBy('ProductId')
        //                 ->limit(10)->get();
        $product_pay = OrderDetails::orderBy('id', 'DESC')->limit(10)->get();
        // $product_pay = OrderDetails::select("ProductId", DB::raw("sum(Quantity) as amount"))
        //                 ->orderBy('amount','desc')
        //                 ->groupBy("ProductId")->limit(10)->get();
     
        $cart = Cart::content();   // CART

        // SEARCH PRODUCT
        $keywords = $request->txtSearch;    
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }

        $category_footer = CategoryProducts::orderBy("id","DESC")->limit(9)->get();
  
        return view("user.index", compact(
            "categories", 
            "products", 
            "products_desc",
            "product_asc", 
            "product_bt", 
            "products_sale", 
            "product_pay",
            "cart", 
            "search_product",
            "category_footer"));
    }

    public function search(Request $request)
    {
       return view("user.index", compact("search_product"));
    }
}
