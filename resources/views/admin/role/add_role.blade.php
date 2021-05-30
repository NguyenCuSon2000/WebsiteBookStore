@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm quyền người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Quyền</label>
            <input type="text"  class="form-control" name="txtName" placeholder="Tên quyền" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="slstt"  class="form-control form-control-sm">
                <option disabled selected>Chọn trạng thái</option>
                <option value="0">Ngừng</option>
                <option value="1">Hoạt động</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection