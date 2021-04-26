<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Users::paginate(10);
        return view("admin.users",["db"=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.add_user");
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
        $user = new Users();
        $user->UserName = $request->txtName;
        $user->Password = $request->txtpw;
        $user->Email = $request->txtemail;
        $user->Phone = $request->txtsdt;
        $user->address = $request->txtad;
        $user->Status = $request->slstt;
        $user->save();
      
        return redirect()->route('user.index')->with("message","Thêm người dùng thành công");
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
        if ($id == null) {
            return redirect()->route("user.index");
        }
        else {
            $db = Users::find($id);
            return view("admin.edit_user",['db'=>$db]);
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
        $db = Users::find($id);
        $db->UserName = $request->input('txtName');
        $db->Password = $request->input('txtpw');
        $db->Email = $request->input('txtemail');
        $db->Phone = $request->input('txtsdt');
        $db->Address = $request->input('txtad');
        $db->Status = $request->input("slstt");
        $db->save();
        return redirect()->route('user.index',[$id])->with("message","Cập nhật thành công");
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
        $db = Users::findOrFail($id);
        $db->delete();
        return redirect()->route("user.index")->with("Xóa thành công");
    }

    public function search(Request $request)
    {
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Users::paginate(10);
        }
        else {
            $db = Users::where('username','LIKE','%'.$text.'%')->paginate(50);
        }
        return view('admin.users', ['db'=>$db]);
    }
}
