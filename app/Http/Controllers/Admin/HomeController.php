<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CategoryProducts;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    // public function __construct() {
	// 	$this->middleware('auth');
	// }

    // public function AuthLogin()
    // {
    //     $admin_id = Auth::id();
    //     if ($admin_id) {
    //         return redirect()->route('/admin/index');
    //     }else {
    //         return redirect()->route('login');
    //     }
    // }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // var_dump(Auth::user());
        // $name = Auth::user()->username;
        // $this->AuthLogin();
        $count_category= CategoryProducts::count();
        $count_product = Products::count();
        $count_customer = Customers::count();
        // $count_customer = Customers::groupBy('Email')
        //                           ->selectRaw('count(id) as amount, Email')
        //                           ->get()->count();
        $count_order = Orders::count();


        $order_new = Orders::orderby("Status", "asc")->orderBy("id","desc")->limit(5)->get();

     
        return view("admin.index", compact(
            "count_category",
            "count_product",
            "count_customer",
            "count_order",
            "order_new"
        ));
        // return "Hello everyone >> ".Auth::user()->username;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
