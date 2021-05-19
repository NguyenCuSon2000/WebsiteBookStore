<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = Contact::orderby("status","asc")->paginate(10);
        return view("admin.contact.contact", ['db'=>$db]);
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
            return redirect()->route("contact_admin.index");
        }
        else {
            $db = Contact::find($id);
            return view("admin.contact.edit_contact",['db'=>$db]);
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
        $db = Contact::find($id);
        $db->name = $request->input('txtName');
        $db->email = $request->input('txtEmail');
        $db->address = $request->input('txtAd');
        $db->title = $request->input('txtTitle');
        $db->content = $request->input('txtContent');
        $db->status = $request->input('sl_stt');
        $db->save();
        return redirect()->route('contact_admin.index',[$id])->with("message","Cập nhật thành công");

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
        $db = Contact::findOrFail($id);
        $db->delete();
        return redirect()->route("contact_admin.index")->with('message', 'Xóa thông tin thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = Contact::paginate(10);
        }
        else {
            $db = Contact::where('name','LIKE','%'.$text.'%')
                           ->orWhere('email','LIKE','%'.$text.'%')
                           ->orWhere('content','LIKE','%'.$text.'%')
                           ->orWhere('address','LIKE','%'.$text.'%')
                           ->orWhere('title','LIKE','%'.$text.'%')->paginate(1000);
        }
        return view('admin.contact.contact', ['db'=>$db]);
    }
}
