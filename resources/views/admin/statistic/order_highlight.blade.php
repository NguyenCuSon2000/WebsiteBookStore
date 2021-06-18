@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê đơn hàng nổi bật</p>

<form action="" id="form_hight" method="get">
        <div class="form-group">
            <label for="">Nổi bật về</label>
            <select class="hight form-control form-control-sm" name="hight">
              <option {{ Request::get('hight') == "qty" || !Request::get('hight') ? "selected='selected'" : "" }} value="qty" selected>Số lượng đơn hàng</option>
              <option {{ Request::get('hight') == "total" ? "selected='selected'" : "" }} value="total">Tổng tiền đặt</option>
            </select>
          </div>
    </form>
<div class="right__table mt-5">
    <div class="right__tableWrapper">
        @php
        $tt = 1;
        @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng đơn đặt hàng</th>
                    <th>Tổng tiền đặt(VNĐ)</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($order_highlight  as  $r)
                <tr>
                    <td data-label="STT">{{ $tt++ }}</td>
                    <td data-label="Mã khách hàng">{{$r->customer->id}}</td>
                    <td data-label="Tên khách hàng" style="text-align:left">{{ $r->customer->CustomerName }}</td>
                    <td data-label="Địa chỉ"  style="text-align:left">{{ $r->customer->Address }}</td>
                    <td data-label="Số điện thoại">{{ $r->customer->Phone }}</td>
                    <td data-label="Tổng đơn hàng">{{ $r->amount }}</td>
                    <td data-label="Tổng tiền đặt(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->sum_total ) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    {{$order_highlight->links()}}
</div>
@endsection
