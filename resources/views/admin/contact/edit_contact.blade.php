@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật bình luận</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('contact_admin.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="txtName">Người bình luận</label>
            <input type="text" class="form-control" name="txtName" value="{{ $db->name }}" placeholder="Người liên hệ">
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="txtEmail" value="{{ $db->email }}" placeholder="Email">
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Địa chỉ</label>
            <input type="text" class="form-control" name="txtAd" value="{{ $db->address }}" placeholder="Địa chỉ">
        </div>
        <div class="right__inputWrapper">
            <label for="txtTitle">Tiêu đề</label>
            <input type="text" class="form-control" name="txtTitle" value="{{ $db->title }}" placeholder="Tiêu đề">
        </div>
        <div class="right__inputWrapper">
            <label for="txtContent">Nội dung</label>
            <textarea class="form-control" name="txtContent" id="" rows="3">{{ $db->content }}</textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="p_contact">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="0" {{ $db->status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection