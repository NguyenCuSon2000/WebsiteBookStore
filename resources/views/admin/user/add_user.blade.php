@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">UserName</label>
            <input type="text" class="form-control" name="txtName" placeholder="UserName" required>
        </div>
        <div class="right__inputWrapper">
            <label for="date">Password</label>
            <input type="password" class="form-control" name="txtpw" id="" required>
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="txtemail" placeholder="Email" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" class="form-control" name="txtsdt" placeholder="Số điện thoại" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Địa chỉ</label>
            <input type="text" class="form-control" name="txtad" placeholder="Địa chỉ" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="slstt" class="form-control form-control-sm">
                <option value="1">Hoạt động</option>
                <option value="0">Ngừng</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection