@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật danh mục</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('category.update', $db->id) }}" method="post">
       @csrf
       @method("PUT")
       <div class="right__inputWrapper">
            <input type="hidden" type="text" value="" name="txtId" placeholder="">
        </div>
        <div class="right__inputWrapper">
            <label for="title">Tiêu đề</label>
            <input type="text" value="{{ $db->CategoryName }}" name="txtName"  class="form-control @error('txtName') is-invalid @enderror" required autocomplete="txtName" autofocus>
            @error('txtName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea style="resize: none" id="ckeditor2" name="txtdes" cols="30" rows="10" class="form-control @error('txtdes') is-invalid @enderror" value="{{ old('txtdes') }}" required autocomplete="txtdes" autofocus>{{ $db->Description }}</textarea>
            @error('txtdes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" name="update_categogy_product" type="submit">Cập nhật</button>
    </form>
</div>
@endsection