<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProducts;
class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = CategoryProducts::all();
        return view("admin.category",['db'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.add_category");
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
        $category = new CategoryProducts();
        $category->CategoryName = $request->txtName;
        $category->Description = $request->txtdes;
        $category->Status = $request->sl_stt;
        $category->save();

        return redirect()->route('category.index')->with('msg','Đăng bài thành công');
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
            return view("admin.edit_category",['db'=>$db]);
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
        $db = CategoryProducts::find($id);
        $db->CategoryName = $request->input('txtName');
        $db->Description= $request->input('txtdes');
        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("category.index", [$id]);
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
       
        return redirect()->route('category.index');
    }
}

