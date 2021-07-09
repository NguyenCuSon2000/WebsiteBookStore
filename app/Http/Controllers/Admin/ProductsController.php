<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Http\Requests\ProductRequest;
use Auth;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel; 

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Products::orderBy("id","desc")->paginate(10);
        return view('admin.product.product', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $db = CategoryProducts::all();
        // $db = CategoryProducts::where("CategoryName");
        return view("admin.product.add_product", ['db'=>$db]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $product = new Products();
        $product->ProductName = $request->txtName;
        $product->Cate_Id = $request->txtCate;
        $product->Description = $request->txtDes;
        
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $product->Picture = $filename;
        }
        else {
            return $request;
            $product->Picture = "";
        }

        $product->Price = $request->txtprice;
        $product->Status = $request->sl_stt;
        $product->save();

        return redirect()->route('product.index')->with('message', 'Thêm sản phẩm thành công');

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
        $pictures = Products::find($id)->pictures;
        return view("admin.product.show_picture", compact("pictures"));
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
        if ($id==null) {
            return redirect()->route("product.index");
        }
        else {
            $db = Products::find($id);
            $categories = CategoryProducts::all();
            // dd($db, $categories);
            return view("admin.product.edit_product",compact("db","categories"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $db = Products::find($id);
        $db->ProductName = $request->input('txtName');
        $db->Cate_Id = $request->input('txtCate');
        $db->Description = $request->input('txtDes');
        
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $db->Picture =  $filename;
        }
        else {
            $db->Picture = "";
        }
      
        $db->Price = $request->input('txtprice');
        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("product.index", [$id])->with('message', 'Cập nhật sản phẩm thành công');

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
        $db = Products::findOrFail($id);
        $db->delete();
        return redirect()->route("product.index")->with('message', 'Xóa sản phẩm thành công');
    }

    
    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Products::paginate(10);
        }
        else {
            $db = Products::join('category_products','products.Cate_id','=','category_products.id')
                           ->select('products.*')
                           ->where('products.ProductName','LIKE','%'.$text.'%')
                           ->orWhere('products.id','LIKE','%'.$text.'%')
                           ->orWhere('products.Price','LIKE','%'.$text.'%')
                           ->orWhere('category_products.CategoryName','LIKE','%'.$text.'%')->paginate(1000);
        }
        return view('admin.product.product', ['db'=>$db]);
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
        return back();
    }
}
