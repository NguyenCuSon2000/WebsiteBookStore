<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Products;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Comments::paginate(10);
        return view("admin.comment.comment", ["db"=>$db]);
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
    public function edit($id=null)
    {
        //
        if ($id==null) {
            return redirect()->route("comment.index");
        }
        else {
            $db = Comments::find($id);
            $products = Products::all();
            return view("admin.comment.edit_comment",compact("db","products"));
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
        $db = Comments::find($id);
        $db->ProductId = $request->input('txtProduct');
        $db->name = $request->input("txtName");
        $db->email = $request->input("txtEmail");
        $db->content = $request->input("txtContent");
        $db->save();
        return redirect()->route("comment.index", [$id])->with('message', 'Cập nhật bình luận thành công');
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
        $db = Comments::findOrFail($id);
        $db->delete();
        return redirect()->route("comment.index")->with('message', 'Xóa bình luận thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Comments::paginate(10);
        }
        else {
            $db = Comments::join('products','comments.ProductId','=','products.id')
                           ->select('comments.*')
                           ->where('comments.name','LIKE','%'.$text.'%')
                           ->orWhere('comments.email','LIKE','%'.$text.'%')
                           ->orWhere('comments.content','LIKE','%'.$text.'%')
                           ->orWhere('products.ProductName','LIKE','%'.$text.'%')->paginate(1000);
        }
        return view('admin.comment.comment', ['db'=>$db]);
    }
}
