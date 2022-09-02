@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm sản phẩm</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tên sách</label>
            <input type="text" name="txtName" class="form-control @error('txtName') is-invalid @enderror"  placeholder="Tên sách" value="{{ old('txtName') }}" required autocomplete="txtName" autofocus>
            @error('txtName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Loại sách</label>
            <select name="txtCate" class="form-control form-control-sm">
                @foreach($db as $r)
                    <option value="{{ $r->id }}">{{ $r->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea name="txtDes" id="ckeditor2" cols="30" rows="10" placeholder="Mô tả" class="form-control @error('txtDes') is-invalid @enderror" value="{{ old('txtDes') }}" required autocomplete="txtDes" autofocus></textarea>
            @error('txtDes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh 1</label>
            <input type="file" name="fileImg" class="form-control" required>
        </div>
        <div class="right__inputWrapper">
            <label for="images">Hình ảnh liên quan</label>
            <input type="file" name="images[]" class="form-control" required multiple="multiple">
            
        </div>
        <div class="right__inputWrapper">
            <label for="price">Đơn giá</label>
            <input type="number" name="txtprice" class="form-control @error('txtprice') is-invalid @enderror"  placeholder="Đơn giá" value="{{ old('txtprice') }}" required min=0 autocomplete="txtprice" autofocus>
            @error('txtprice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="quantity">Số lượng tồn</label>
            <input type="number" name="nQuantity" class="form-control @error('nQuantity') is-invalid @enderror"  placeholder="Số lượng" value="{{ old('nQuantity') }}" min=1 required autocomplete="nQuantity" autofocus>
            @error('nQuantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection