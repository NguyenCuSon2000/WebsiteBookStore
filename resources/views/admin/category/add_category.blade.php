@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm danh mục</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tên loại sách</label>
            <input type="text" name="txtName" class="form-control @error('txtName') is-invalid @enderror"  placeholder="Tên loại sách" value="{{ old('txtName') }}" required autocomplete="txtName" autofocus>
            @error('txtName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="txtdes">Mô tả</label>
            <textarea id="ckeditor" name="txtdes" cols="30" rows="10" placeholder="Mô tả" class="form-control @error('txtdes') is-invalid @enderror" value="{{ old('txtdes') }}" required autocomplete="txtdes" autofocus></textarea>
            @error('txtdes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select class="form-control form-control-sm" name="sl_stt">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" name="add_categogy_product" type="submit">Add</button>
    </form>
</div>
@endsection