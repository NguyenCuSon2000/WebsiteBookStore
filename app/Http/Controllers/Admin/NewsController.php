<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewRequest;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = News::orderBy('id','DESC')->paginate(5);
        return view("admin.new.new", compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.new.add_new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        //
        $new = new News();
        $new->title = $request->txtName;
        $new->description = $request->txtDes;
        $new->content = $request->txtContent;
        
        if($request->hasfile('fileImg')){
            $file = $request->file('fileImg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img', $filename);
            $new->picture = $filename;
        }
        else {
            return $request;
            $new->picture = "";
        }
        $new->date = Carbon::now('Asia/Ho_Chi_Minh');
        $new->status = $request->sl_stt;
        $new->save();

        return redirect()->route('news.index')->with('message', 'Thêm tin thành công');
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
            return redirect()->route("news.index");
        }
        else {
            $db = News::find($id);
            return view("admin.new.edit_new",compact("db"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        //
        $db = News::find($id);
        $db->title = $request->input('txtName');
        $db->description = $request->input('txtDes');
        $db->content = $request->input('txtContent');
        
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
        
        $db->date = $request->input('txtdate');
        $db->Status = $request->input('sl_stt');
        $db->save();
        return redirect()->route("news.index", [$id])->with('message', 'Cập nhật tin tức thành công');
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
        $db = News::findOrFail($id);
        $db->delete();
        return redirect()->route("news.index")->with('message', 'Xóa tin thành công');
    }

    public function search(Request $request)
    {
        //
        $text = $request->input("txtSearch");
        if ($text == "") {
            $db = News::paginate(10);
        }
        else {
            $db = News::where('title','LIKE','%'.$text.'%')
                            ->orWhere('id','LIKE','%'.$text.'%')
                            ->orWhere('description','LIKE','%'.$text.'%')
                            ->orWhere('content','LIKE','%'.$text.'%')
                            ->orWhere('date','LIKE','%'.$text.'%')->paginate(1000);
        }
        return view('admin.new.new', ['db'=>$db]);
    }
}
