@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thêm sản phẩm khuyến mãi</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('discount.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="right__inputWrapper">
            <label for="p_category">Tên sách</label>
            <select name="txtProId"  class="form-control form-control-sm"  required autocomplete="txtProId" autofocus>
                @foreach($db as $r)
                    <option value="{{ $r->id}}">{{ $r->ProductName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="title">Phần trăm khuyến mãi</label>
            <input type="number" class="form-control @error('txtPer') is-invalid @enderror" value="{{ old('txtPer') }}" autocomplete="txtPer" autofocus min="1" max="100"  name="txtPer" placeholder="Phần trăm" required>
            @error('txtPer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày bắt đầu</label>
            <input type="date" class="form-control @error('txtBegin') is-invalid @enderror"  value="{{ old('txtBegin') }}" required autocomplete="txtBegin" autofocus name="txtBegin" id="">
            @error('txtBegin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày kết thúc</label>
            <input type="date" class="form-control @error('txtEnd') is-invalid @enderror" value="{{ old('txtEnd') }}" autocomplete="txtEnd" autofocus name="txtEnd" id="" required>
            @error('txtEnd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_picture">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                 <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Thêm</button>
    </form>
</div>
@endsection