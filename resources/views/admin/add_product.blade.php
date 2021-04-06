@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm sản phẩm</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" name="txtName" placeholder="Tiêu đề">
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Danh mục</label>
            <select name="txtCate">
                @foreach($db as $r)
                     <option value="{{ $r->id }}">{{ $r->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea name="txtDes" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh 1</label>
            <input type="file" name="fileImg">
        </div>

        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt">
                <option disabled selected>Chọn trạng thái</option>
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
            </select>
        </div>
        <button class="btn" type="submit">Thêm</button>
    </form>
</div>
@endsection