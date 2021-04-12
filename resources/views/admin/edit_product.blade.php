@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật sản phẩm</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('product.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" value="{{ $db->ProductName }}" name="txtName" >
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Danh mục</label>
            <select name="txtCate">
                <option value="{{ $db->category->id }}">{{ $db->category->CategoryName }}</option>
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea name="txtDes" id="" cols="30" rows="10" placeholder="Mô tả">{{ $db->Description}}</textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh 1</label>
            <input type="file" value="" name="fileImg">
        </div>
        <div class="right__inputWrapper">
            <label for="price">Đơn giá</label>
            <input type="text" value="{{ $db->Price }}" name="txtprice" >
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection