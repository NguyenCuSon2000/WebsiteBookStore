@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật tin tức</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('news.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" value="{{ $db->title }}" name="txtName" >
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea name="txtDes" cols="30" rows="5" placeholder="Mô tả">{{ $db->description}}</textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Nội dung</label>
            <textarea name="txtContent" cols="30" rows="10"  id="ckeditor3" placeholder="Nội dung">{{ $db->content}}</textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh</label>
            <input type="file" value="{{ $db->picture }}" name="fileImg">
        </div>
        <div class="right__inputWrapper">
            <label for="price">Ngày đăng</label>
            <input type="date" value="{{ $db->date }}" name="txtdate" >
        </div>
        <div class="right__inputWrapper">
            <label for="p_new">Trạng thái</label>
            <select name="sl_stt">
                <option value="0" {{ $db->status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection