<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Roles::paginate(10);
        return view("admin.role.role", compact("db"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.role.add_role");
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
        $role = new Roles();
        $role->name = $request->txtName;
        $role->status = $request->slstt;
        $role->save();

        return redirect()->route('role.index')->with('message', 'Thêm quyền thành công');
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
            return redirect()->route("role.index");
        }
        else {
            $db = Roles::find($id);
            return view("admin.role.edit_role",compact("db"));
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
        $db = Roles::find($id);
        $db->name = $request->input('txtName');
        $db->status = $request->input("sl_stt");
        $db->save();
        return redirect()->route("role.index",[$id])->with('message','Cập nhật quyền thành công');
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
        $db = Roles::findOrFail($id);
        $db->delete();
        return redirect()->route("role.index")->with('message', 'Xóa quyền thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Roles::paginate(6);
        }
        else {
            $db = Roles::where('name','LIKE','%'.$text.'%')->paginate(20);
        }
        return view('admin.role.role', ['db'=>$db]);
    }

   
}
