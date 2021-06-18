<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Auth;

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
        $db = User::orderBy('id','DESC')->paginate(10);
        return view("admin.user.users", compact("db"));
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
        if ($id == null) {
            return redirect()->route("user.index");
        }
        else {
            $db = User::find($id);
            $role = Roles::all();
            return view("admin.user.edit_user",['db'=>$db,'role'=>$role]);
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
        $db = User::find($id);
        $db->username = $request->input('txtName');
        $db->password = Hash::make($request->input('txtpw')) ;
        $db->role_id = $request->input('sl_role');
        $db->status = $request->input('slstt');
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
        $db = User::findOrFail($id);
        $db->delete();
        return redirect()->route("user.index")->with("Xóa thành công");
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = User::paginate(10);
        }
        else {
            $db = User::join('roles', 'users.role_id','=','roles.id')
                            ->select('users.*')
                            ->where('users.username','LIKE','%'.$text.'%')
                            ->orWhere('users.id','LIKE','%'.$text.'%')
                            ->orWhere('users.created_at','LIKE','%'.$text.'%')
                            ->orWhere('roles.name','LIKE','%'.$text.'%')
                            ->paginate(1000);
        }
        return view('admin.user.users', ['db'=>$db]);
    }
}
