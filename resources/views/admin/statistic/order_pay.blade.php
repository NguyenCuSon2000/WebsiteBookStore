@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê đơn hàng</p>
<div class="container">
    <div class="row">
        <div class="right__cards">
            <a class="right__card" href="">
                <div class="right__cardTitle">Tổng doanh thu</div>
                <div class="right__cardNumber">{{ number_format($order_total) }} đ</div>
                <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
            </a>
            <a class="right__card" href="">
                <div class="right__cardTitle">Đơn hàng đã xử lý</div>
                <div class="right__cardNumber">{{ number_format($order_done) }} đ</div>
                <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
            </a>
            <a class="right__card" href="">
                <div class="right__cardTitle">Đơn hàng chờ xử lý</div>
                <div class="right__cardNumber">{{ number_format($order_wait) }} đ</div>
                <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
            </a>
            <a class="right__card" href="">
                <div class="right__cardTitle">Doanh thu theo ngày tháng</div>
                <div class="right__cardNumber">{{ number_format($order_total_date) }} đ</div>
                <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
            </a>
        </div>
        <div class="col-md-6 left_date">
            <form role="form" action="" method="get">
                @csrf
                <div class="form-group">
                    <label for="">Từ <span class="time"> {{ \Carbon\Carbon::parse($date_from)->format('d/m/Y') }}</span></label>
                    <input type="date" name="date_from" value="" class="form-control">
                   
                </div>
                <div class="form-group">
                    <label for="">đến <span class="time">{{ \Carbon\Carbon::parse($date_to)->format('d/m/Y') }}</span></label>
                    <input type="date" name="date_to" value="" class="form-control">
                </div>
                <input type="submit" class="btn btn-success" value="THỐNG KÊ">
            </form>
        </div> 
    </div>
</div>


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
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số điện thoại nhận</th>
                    <th>Địa chỉ nhận</th>
                    <th>Tổng tiền (VNĐ)</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($order_pay as  $r)
                <tr>
                    <td>{{ $tt++ }}</td>
                    <td data-label="Mã đơn hàng">{{$r->id}}</td>
                    <td data-label="Tên khách hàng" style="text-align:left">{{ $r->customer->CustomerName }}</td>
                    <td data-label="Ngày đặt">{{ \Carbon\Carbon::parse($r->OrderDate)->format('d/m/Y') }}</td>
                    <td data-label="Số điện thoại nhận">{{ $r->ShipPhone }}</td>
                    <td data-label="Địa chỉ nhận" style="text-align:left">{{ $r->ShipAddress }}</td>
                    <td data-label="Tổng tiền" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->total ) }}</td>
                    <td data-label="Ghi chú" style="text-align:left">{{ $r->Note }}</td>
                    <td data-label="Trạng thái">
                        @if( $r->Status == 0)
                        <a href="#" class="label label-warning">Chờ xử lý</a>
                        @else
                        <a href="#" class="label-success label">Đã xử lý</a>
                        @endif
                    </td>
                    <td data-label="Xem" class="right__iconTable">
                        <a  data-id ="{{ $r->id }}" href="{{ route('order.show', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                    </td>
                    <td data-label="Xoá" class="right__iconTable">
                        <form role="form" action="{{ route('order.destroy', $r->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><img src="{{ asset('assets/icon-trash-black.svg') }}" alt=""></button>   
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a target="_blank" href="{{ route('print_order', $r->id) }}">In đơn hàng</a>
</div>



@endsection
