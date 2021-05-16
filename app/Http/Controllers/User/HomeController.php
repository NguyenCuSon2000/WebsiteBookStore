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

class HomeController extends Controller
{
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


        $products = Products::limit(3)->get();     //LIST PRODUCT
        $product_asc = Products::orderby("ProductName", "asc")->limit(3)->get();
        $product_bt= Products::whereBetween("Price", [25000, 100000])->limit(6)->get();

        $products_sale = Discount::all(); // LIST DISCOUNT PRODUCT


        $product_pay = OrderDetails::groupBy('ProductId')       // PRODUCT PAY
                        ->selectRaw('sum(Quantity) as amount, ProductId')
                        ->orderBy('amount','desc')->limit(10)->get();

        $cart = Cart::content();   // CART

        // SEARCH PRODUCT
        $keywords = $request->txtSearch;    
        if ($keywords == "") {
            $search_product = Products::limit(0)->get();
        }
        else {
            $search_product = Products::where("ProductName","LIKE","%".$keywords."%")->get();
        }
  
        return view("user.index", compact(
            "categories", 
            "products", 
            "product_asc", 
            "product_bt", 
            "products_sale", 
            "product_pay",
            "cart", 
            "search_product"));
    }

    public function search(Request $request)
    {
       return view("user.index", compact("search_product"));
    }
}
