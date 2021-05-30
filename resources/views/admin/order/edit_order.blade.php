@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật đơn hàng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('order.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
      
        <div class="right__inputWrapper">
            <label for="p_category">Tên khách hàng</label>
            <select name="cus_id" class="form-control form-control-sm">
                <option value="{{ $db->customer->id }}" selected>{{ $db->customer->CustomerName }}</option>
                @foreach($customers as $r)
                     <option value="{{ $r->id }}">{{ $r->CustomerName }}</option>
                @endforeach
            </select>
        </div>
       
        <div class="right__inputWrapper">
            <label for="Phone">Số điện thoại nhận</label>
            <input type="text" value="{{ $db->ShipPhone }}" name="txtPhone" class="form-control" required autocomplete="txtPhone" autofocus>
        </div>
        <div class="right__inputWrapper">
            <label for="Address">Địa chỉ nhận</label>
            <input type="text" value="{{ $db->ShipAddress }}" name="txtAd" class="form-control" required autocomplete="txtAd" autofocus>
        </div>
        <div class="right__inputWrapper">
            <label for="Note">Ghi chú</label>
            <input type="text" value="{{ $db->Note }}" name="txtNote" class="form-control" required autocomplete="txtNote" autofocus>
        </div>
        <div class="right__inputWrapper">
            <label for="Total">Tổng tiền</label>
            <input type="number" value="{{ $db->total }}" name="txtTotal" class="form-control" required autocomplete="txtTotal" autofocus>
        </div>
        <div class="right__inputWrapper">
            <label for="txtDate">Ngày đặt</label>
            <input type="date" value="{{ $db->OrderDate }}" name="txtDate" class="form-control" required autocomplete="txtDate" autofocus>
        </div>
        <div class="right__inputWrapper">
            <label for="p_product">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <option value="0" {{ $db->Status==0?"":"selected"}}>Chờ xử lý</option>
                <option value="1" {{ $db->Status==0?"":"selected"}}>Đã xử lý</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection