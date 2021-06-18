@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật sản phẩm khuyến mãi</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('discount.update', $db->id) }}" method="post" enctype="multipart/form-data">
       @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="p_category">Tên sách</label>
            <select name="txtProId"  class="form-control form-control-sm" required autocomplete="txtProId" autofocus>
                <option value="{{ $db->product->id }}" selected>{{ $db->product->ProductName }}</option>
                @foreach($products as $r)
                     <option value="{{ $r->id }}">{{ $r->ProductName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="title">Phần trăm khuyến mãi</label>
            <input type="number" value="{{ $db->Percent }}" class="form-control @error('txtPer') is-invalid @enderror" value="{{ old('txtPer') }}" autocomplete="txtPer" autofocus min="1" max="100"  name="txtPer" placeholder="Phần trăm" required>
            @error('txtPer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày bắt đầu</label>
            <input type="date" value="{{ $db->BeginDate }}" class="form-control @error('txtBegin') is-invalid @enderror"  value="{{ old('txtBegin') }}" required autocomplete="txtBegin" autofocus name="txtBegin" id="">
            @error('txtBegin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="date">Ngày kết thúc</label>
            <input type="date" value="{{ $db->EndDate }}" class="form-control @error('txtEnd') is-invalid @enderror" value="{{ old('txtEnd') }}" autocomplete="txtEnd" autofocus name="txtEnd" id="" required>
            @error('txtEnd')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="right__inputWrapper">
            <label for="p_product">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="0" {{ $db->Status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection