<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <link rel="stylesheet" href="{{ asset('css/pay.css') }}"> -->
<!------ Include the above in your HEAD tag ---------->

@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.3.jpg')}});">
</section>
<!--slider sec end-->

<div class="about_content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10  text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                <h1 class="heading">Lịch sử mua hàng</h1>
                <p class="para_text">"Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.” <b>- Gustavơ Lebon -</b></p>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row order-body">
            @php
            $tt = 1;
            @endphp
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="title">STT</th>
                        <th class="title">Mã đơn hàng</th>
                        <th class="title">Tên khách hàng</th>
                        <th class="title">Ngày đặt</th>
                        <th class="title">Số điện thoại nhận</th>
                        <th class="title">Địa chỉ nhận</th>
                        <th class="title">Tổng tiền (VNĐ)</th>
                        <th class="title">Ghi chú</th>
                        <th class="title">Trạng thái</th>
                        <th class="title">Xem</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($order_history as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Mã đơn hàng">{{$r->id}}</td>
                        <td data-label="Tên khách hàng" style="text-align:left">{{ $r->customer->CustomerName }}</td>
                        <td data-label="Ngày đặt">{{ \Carbon\Carbon::parse($r->OrderDate)->format('d/m/Y') }}</td>
                        <td data-label="Số điện thoại nhận">{{ $r->ShipPhone }}</td>
                        <td data-label="Địa chỉ nhận" style="text-align:left">{{ $r->ShipAddress }}</td>
                        <td data-label="Tổng tiền(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->total ) }}</td>
                        <td data-label="Ghi chú" style="text-align:left">{{ $r->Note }}</td>
                        <td data-label="Trạng thái">
                            @if($r->Status == 0)
                            <a href="#" class="label label-warning">Chờ xử lý</a>
                            @else
                            <a href="#" class="label-success label">Đã xử lý</a>
                            @endif
                        </td>
                        <td data-label="Xem" class="right__iconTable">
                            <a  data-id ="{{ $r->id }}" href="{{ route('history_order_detail', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
   
</div>
@endsection