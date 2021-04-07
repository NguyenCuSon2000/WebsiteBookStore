<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryProducts;
use App\Models\Products;

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
        // $db = CategoryProducts::find(1)->products->toArray();
        // dd($db);
        // $db = Products::find(2)->category;
        // dd($db);
        $db = Products::with('category')->get();
        return view('admin.product', compact('db'));
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
        return view("admin.add_product", ['db'=>$db]);
    }

    // public function doUpload(Request $request)
    // {
    //     $file = $request->filesTest;

    //     $file->move('upload', $file->getClientOriginalName());
    //     // hàm sẽ trả về đường dẫn mới của file trên server nếu thành công
    //     // còn nếu không nó sẽ raise ra exception.
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $product->Status = $request->sl_stt;
        $product->save();

        return redirect()->route('product.index')->with('msg', 'Đăng bài thành công');

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
    public function edit($id=nul)
    {
        //
        if ($id==null) {
            return redirect()->route("product.index");
        }
        else {
            $db = Products::find($id);
            return view("admin.edit_product",['db'=>$db]);
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
            // return $request;
            $db->Picture = "";
        }

        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("product.index", [$id]);

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
        return redirect()->route("product.index");
    }

    
    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        $db = Products::where('ProductName','LIKE','%'.$text.'%')->get();

        return view('admin.product', ['db'=>$db]);
    }
}
