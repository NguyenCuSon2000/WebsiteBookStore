@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm quyền người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Quyền</label>
            <input type="text" name="txtName" placeholder="Tên quyền">
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="slstt">
                <option disabled selected>Chọn trạng thái</option>
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection