@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm tin</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" name="txtName" class="form-control @error('txtName') is-invalid @enderror"  placeholder="Tiêu đề" value="{{ old('txtName') }}" required autocomplete="txtName" autofocus>
            @error('txtName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="date">Mô tả</label>
            <textarea name="txtDes" cols="30" rows="5" placeholder="Mô tả" class="form-control @error('txtDes') is-invalid @enderror" value="{{ old('txtDes') }}" required autocomplete="txtDes" autofocus></textarea>
            @error('txtDes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Nội dung</label>
            <textarea name="txtContent"  cols="30" rows="10" id="ckeditor3" placeholder="Nội dung" class="form-control @error('txtContent') is-invalid @enderror" value="{{ old('txtContent') }}" required autocomplete="txtContent" autofocus></textarea>
            @error('txtContent')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Hình ảnh</label>
            <input type="file" class="form-control" name="fileImg" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_new">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection