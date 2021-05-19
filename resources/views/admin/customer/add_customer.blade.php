@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm khách hàng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tên khách hàng</label>
            <input type="text" class="form-control"  name="txtName" placeholder="Tên khách hàng" required>
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày sinh</label>
            <input type="date" class="form-control" name="txtDate" id="" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Địa chỉ</label>
            <input type="text" class="form-control" name="txtAd" required>
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" class="form-control" name="txtsdt" placeholder="Số điện thoại" required>
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="txtemail" placeholder="Email" required>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection