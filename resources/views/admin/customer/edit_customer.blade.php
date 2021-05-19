@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật khách hàng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('customer.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <input type="hidden" type="text" value="" name="txtId" placeholder="">
        </div>
        <div class="right__inputWrapper">
            <label for="title">Tên khách hàng</label>
            <input type="text" class="form-control" name="txtName" value="{{ $db->CustomerName }}" required>
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày sinh</label>
            <input type="date" class="form-control" name="txtDate" id="" value="{{ $db->DateOfBirth }}" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Địa chỉ</label>
            <input type="text" class="form-control" name="txtAd" value="{{ $db->Address }}" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" class="form-control" name="txtsdt" value="{{ $db->Phone }}" required>
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="txtemail" value="{{ $db->Email }}" required>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection