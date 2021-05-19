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
            <input type="text" value="{{ $db->ProductName }}" name="txtName" class="form-control @error('txtName') is-invalid @enderror"  placeholder="Tên sách" value="{{ old('txtName') }}" required autocomplete="txtName" autofocus>
            @error('txtName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Loại sách</label>
            <select name="txtCate" class="form-control form-control-sm">
                <option value="{{ $db->category->id }}" selected>{{ $db->category->CategoryName }}</option>
                @foreach($categories as $r)
                     <option value="{{ $r->id }}">{{ $r->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea name="txtDes" id="ckeditor3" cols="30" rows="10" placeholder="Mô tả" class="form-control @error('txtDes') is-invalid @enderror" value="{{ old('txtDes') }}" required autocomplete="txtDes" autofocus>{{ $db->Description}}</textarea>
            @error('txtDes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
       
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh 1</label>
            <input type="file" class="form-control" value="{{ $db->Picture }}" name="fileImg" required>
        </div>
        <div class="form-group">
            <img src="{{ asset('img'.'/'.$db->Picture) }}" height="200" width="200" alt="" />
        </div>
        <div class="right__inputWrapper">
            <label for="price">Đơn giá</label>
            <input type="text" value="{{ $db->Price }}" name="txtprice" class="form-control @error('txtprice') is-invalid @enderror"  placeholder="Đơn giá" value="{{ old('txtprice') }}" required autocomplete="txtprice" autofocus>
            @error('txtprice')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_product">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection