<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Carbon\Carbon;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Customers::paginate(10);
        return view("admin.customer",['db'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.add_customer");
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
        $customer = new Customers();
        $customer->CustomerName = $request->txtName;
        $customer->DateOfBirth = $request->txtDate;
        $customer->Address = $request->txtAd;
        $customer->Phone = $request->txtsdt;
        $customer->Email = $request->txtemail;
        $customer->save();

        return redirect()->route('customer.index')->with("message","Thêm khách hàng thành công");
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
    public function edit($id=null)
    {
        //
        if ($id == null) {
            return redirect()->route("customer.index");
        }
        else {
            $db = Customers::find($id);
            return view("admin.edit_customer",['db'=>$db]);
        }
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
        $db = Customers::find($id);
        $db->CustomerName = $request->input('txtName');
        $db->DateOfBirth = $request->input('txtDate');
        $db->Address = $request->input('txtAd');
        $db->Phone = $request->input('txtsdt');
        $db->Email = $request->input('txtemail');
        $db->save();
        return redirect()->route('customer.index',[$id])->with("message","Cập nhật thành công");
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
        $db = Customers::findOrFail($id);
        $db->delete();
        return redirect()->route("customer.index")->with("Xóa thành công");
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Customers::paginate(10);
        }
        else {
            $db = Customers::where('CustomerName','LIKE','%'.$text.'%')->paginate(50);
        }
        return view('admin.customer', ['db'=>$db]);
    }
}