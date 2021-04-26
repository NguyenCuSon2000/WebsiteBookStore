@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">UserName</label>
            <input type="text" name="txtName" placeholder="UserName">
        </div>
        <div class="right__inputWrapper">
            <label for="date">Password</label>
            <input type="password" name="txtpw" id="">
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" name="txtemail" placeholder="Email">
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" name="txtsdt" placeholder="Số điện thoại">
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Địa chỉ</label>
            <input type="text" name="txtad" placeholder="Địa chỉ">
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