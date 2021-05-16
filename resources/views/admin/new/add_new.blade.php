@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm tin</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" name="txtName" placeholder="Tên tiêu đề">
        </div>
        <div class="right__inputWrapper">
            <label for="date">Mô tả</label>
            <textarea name="txtDes" cols="30" rows="5" placeholder="Mô tả"></textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Nội dung</label>
            <textarea name="txtContent"  cols="30" rows="10" id="ckeditor3" placeholder="Nội dung"></textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Hình ảnh</label>
            <input type="file" name="fileImg">
        </div>
        <div class="right__inputWrapper">
            <label for="p_new">Trạng thái</label>
            <select name="sl_stt">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection