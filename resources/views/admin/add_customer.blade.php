@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm khách hàng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="title">Tên khách hàng</label>
            <input type="text" name="txtName" placeholder="Tên khách hàng">
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày sinh</label>
            <input type="date" name="txtDate" id="">
        </div>
        <div class="right__inputWrapper">
            <label for="txtAd">Địa chỉ</label>
            <input type="text" name="txtAd">
        </div>
        <div class="right__inputWrapper">
            <label for="txtsdt">Số điện thoại</label>
            <input type="text" name="txtsdt" placeholder="Số điện thoại">
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" name="txtemail" placeholder="Email">
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection