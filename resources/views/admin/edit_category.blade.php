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
            <input type="text" value="{{ $db->CategoryName }}" name="txtName" placeholder="Tiêu đề">
        </div>
        <div class="right__inputWrapper">
            <label for="desc">Mô tả</label>
            <textarea style="resize: none" name="txtdes" cols="30" rows="10">{{ $db->Description }}</textarea>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="sl_stt">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn" name="update_categogy_product" type="submit">Update</button>
    </form>
</div>
@endsection