<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Products;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Picture::paginate(5);
        return view("admin.picture.picture", compact("db"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product_name = Products::all();
        return view("admin.picture.add_picture", compact("product_name"));
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
        $pictures = new Picture();
        $pictures->ProductId = $request->txtName;
        
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $pictures->picture = $filename;
        }
        else {
            return $request;
            $pictures->picture = "";
        }

        $pictures->status = $request->sl_stt;
        $pictures->save();

        return redirect()->route('picture.index')->with('message', 'Thêm hình ảnh thành công');

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
        if ($id==null) {
            return redirect()->route("picture.index");
        }
        else {
            $db = Picture::find($id);
            $products = Products::all();
            return view("admin.picture.edit_picture",compact("db","products"));
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
        $db = Picture::find($id);
        $db->ProductId = $request->input('txtName');
        
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $db->picture =  $filename;

        }
        else {
            // return $request;
            $db->picture = "";
        }
        $db->status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("picture.index", [$id])->with('message', 'Cập nhật hình ảnh thành công');
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
        $db = Picture::findOrFail($id);
        $db->delete();
        return redirect()->route("picture.index")->with('message', 'Xóa hình ảnh thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Picture::paginate(10);
        }
        else {
            $db = Picture::join('products', 'pictures.ProductId','=','products.id')
                            ->select('pictures.*')
                            ->where('products.ProductName','LIKE','%'.$text.'%')
                            ->paginate(1000);
        }
        return view('admin.picture.picture', ['db'=>$db]);
    }

}
