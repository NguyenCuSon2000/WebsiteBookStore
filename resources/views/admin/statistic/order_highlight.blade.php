@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê đơn hàng nổi bật</p>



<?php
use Illuminate\Support\Facades\Session;
$message = Session::get('message');
if($message){
    echo '<span style="color: red">'.$message.'</span>';
    Session::put('message',null);
}
?>   
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
                    <th>Số lượng đơn hàng</th>
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
                    <td data-label="Số lượng đơn">{{ $r->amount }}</td>
                    <td data-label="Tổng tiền đặt" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->sum_total ) }}</td>
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
