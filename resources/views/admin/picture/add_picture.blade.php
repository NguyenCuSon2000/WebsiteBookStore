@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm hình ảnh</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('picture.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="p_category">Tên sách</label>
            <select name="txtName"  class="form-control form-control-sm">
                @foreach($product_name as $r)
                    <option value="{{ $r->id}}">{{ $r->ProductName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" name="fileImg" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_picture">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
               <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection