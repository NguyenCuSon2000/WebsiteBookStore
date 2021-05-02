@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('user.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="title">UserName</label>
            <input type="text" name="txtName" value="{{ $db->username }}" placeholder="UserName">
        </div>
        <div class="right__inputWrapper">
            <label for="date">Password</label>
            <input type="password" value="{{ $db->password }}" name="txtpw" id="">
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" name="txtemail" value="{{ $db->email }}" placeholder="Email">
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" name="txtsdt" value="{{ $db->phone }}">
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Địa chỉ</label>
            <input type="text" name="txtad" value="{{ $db->address }}">
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="slstt">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection