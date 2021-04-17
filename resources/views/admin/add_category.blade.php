@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm danh mục</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" name="txtName" placeholder="Tiêu đề">
            <div>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea id="editor" name="txtdes" cols="30" rows="10" placeholder="Mô tả"></textarea>
            <div>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt">
                <option disabled selected>Chọn trạng thái</option>
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" name="add_categogy_product" type="submit">Add</button>
    </form>
</div>
@endsection