@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">chi tiết đơn hàng</p>

<?php
use Illuminate\Support\Facades\Session;
$message = Session::get('message');
if($message){
    echo '<span style="color: red">'.$message.'</span>';
    Session::put('message',null);
}
?> 



<div class="right__table">
    <div class="right__tableWrapper">
        @php
        $tt = 1;
        @endphp
        <table >
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Số diện thoại</th>
                    <th>Địa chỉ nhận</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền(đ)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order_customer as $c)
                <tr>
                    <td data-label="Mã đơn hàng">{{$c->order->id}}</td>
                    <td data-label="Tên khách hàng">{{$c->order->customer->CustomerName}}</td>
                    <td data-label="Số diện thoại">{{$c->order->ShipPhone}}</td>
                    <td data-label="Địa chỉ nhận">{{$c->order->ShipAddress}}</td>
                    <td data-label="Ngày đặt"> {{\Carbon\Carbon::parse($c->order->OrderDate)->format('d/m/Y')}}</td>
                    <td data-label="Tổng tiền(đ)" style="color:red; font-weight:bold; text-align:right"> {{ number_format($c->order->total) }}</td>
                </tr>   
                @endforeach   
            </tbody>
        </table>
        <table class="mt-5">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá (đ)</th>
                    <th>Phần trăm khuyến mãi</th>
                    <th>Giá mới (đ)</th>
                    <th>Số lượng</th>
                    <th>Thành tiền (đ)</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($order_details as $r)
                <p></p>
                <tr>
                    <td>{{ $tt++ }}</td>
                    <td data-label="Tên sản phẩm"  style="text-align:left">{{$r->product->ProductName}}</td>
                    <td data-label="Hình ảnh"> <img src="{{asset('img'.'/'.$r->product->Picture)}}" alt="" > </td>
                    <td data-label="Đơn giá(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->product->Price) }}</td>
                    <td data-label="Phần trăm" style="color:red; font-weight:bold">{{ 100 - ((($r->UnitPrice*$r->Quantity)*100)/($r->product->Price*$r->Quantity)) }} %</td>
                    <td data-label="Giá mới(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->UnitPrice)  }}</td>
                    <td data-label="Số lượng">{{ $r->Quantity }}</td>
                    <td data-label="Thành tiền(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->UnitPrice*$r->Quantity) }}</td>
                    <td data-label="Xoá" class="right__iconTable">
                        <form role="form" action="" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button  type="submit" onclick="return confirm('Are you sure to delete?')"><img src="{{ asset('assets/icon-trash.svg') }}" alt=""></button>   
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    {{ $order_details->links() }}
</div>

@endsection
