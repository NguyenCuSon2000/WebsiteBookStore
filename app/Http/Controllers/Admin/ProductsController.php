<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use App\Models\Products;
use App\Models\Picture;
use App\Http\Requests\ProductRequest;
// use Auth;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Auth::id();
        if ($admin_id) {
            return redirect()->route('/admin/index');
        }else {
            return redirect()->route('login');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->AuthLogin();
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
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/img', $filename);
        }
        else {
            return $request;
        }

        $product_id = Products::insertGetId([
            'ProductName' => $request->txtName,
            'Cate_Id' => $request->txtCate,
            'Description' => $request->txtDes,
            'Picture' => $filename,
            'Price' => $request->txtprice,
            'Quantity' => $request->nQuantity,
            'Status' => $request->sl_stt,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $get_image = $request->file('images');
        if($get_image){
            foreach ($get_image as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $name_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('storage/img', $name_image);
                if ($product_id) {
                    // $imageid = Image::insertGetId([
                    //     'image' => $name_image
                    // ]);
                    // Movie_Image::insert([
                    //     'movie_id' => $movie_id,
                    //     'imageid' => $imageid
                    // ]);
                    Picture::insert([
                        'picture' => $name_image,
                        'status' => 1,
                        'ProductId' => $product_id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
              
            }
        }
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
            $pictures = Products::find($id)->pictures;
            return view("admin.product.edit_product",compact("db","categories","pictures"));
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

       if(!$request->hasfile('fileImg')){
          $db->Picture = $request->input("image");
       }
       else {          
            if($request->hasfile('fileImg')){
                $file = $request->file('fileImg');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('storage/img', $filename);
                $db->Picture = $filename;
            }
            else {
                $db->Picture = "";
            }
       } 
       $get_image = $request->file('images');
       if($get_image){
            $picture = Picture::where("ProductId", $id)->delete();
            foreach ($get_image as $image) {
               $get_name_image = $image->getClientOriginalName();
               $name_image = current(explode('.',$get_name_image));
               $name_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
               $image->move('storage/img', $name_image);
               if ($id) {
                    Picture::insert([
                       'picture' => $name_image,
                       'status' => 1,
                       'ProductId' => $id,
                       'created_at' => now(),
                       'updated_at' => now()
                   ]);
               }
           }
        }
        $db->Price = $request->input('txtprice');
        $db->Quantity = $request->input('nQuantity');
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
