<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;


use App\Http\Requests\StoreCategoryRequest;

class CategoryProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','checklogin', 'role']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = CategoryProducts::paginate(10);
        return view("admin.category.category",['db'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.category.add_category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $category = new CategoryProducts();
        $category->CategoryName = $request->txtName;
        $category->Description = $request->txtdes;
        $category->Status = $request->sl_stt;
        $category->save();

        // $category = CategoryProducts::create($request->all());

        return redirect()->route('category.index')->with('message','Thêm loại sách thành công');
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
            return redirect()->route('category.index');
        }
        else {
            $db = CategoryProducts::find($id);
            return view("admin.category.edit_category",['db'=>$db]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        //
        $db = CategoryProducts::find($id);
        $db->CategoryName = $request->input('txtName');
        $db->Description= $request->input('txtdes');
        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("category.index", [$id])->with("message","Cập nhật thành công");
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
        $db = CategoryProducts::findOrFail($id);

        $db->delete();
       
        return redirect()->route('category.index')->with("message","Xóa thành công");
    }


    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = CategoryProducts::paginate(10);
        }
        else {
            $db = CategoryProducts::where('CategoryName','LIKE','%'.$text.'%')
                                    ->orWhere('id','LIKE','%'.$text.'%')
                                    ->orWhere('Description','LIKE','%'.$text.'%')->paginate(1000);
        }
        return view('admin.category.category', ['db'=>$db]);
    }

  
}

