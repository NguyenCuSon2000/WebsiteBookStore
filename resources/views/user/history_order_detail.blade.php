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
            <table class="table table-striped table-inverse table-bordered table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th class="title">Mã đơn hàng</th>
                        <th class="title">Khách hàng</th>
                        <th class="title">Số diện thoại</th>
                        <th class="title">Địa chỉ nhận</th>
                        <th class="title">Ngày đặt</th>
                        <th class="title">Tổng tiền(đ)</th>
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
            <table class="table table-striped table-inverse table-bordered table-responsive mt-5">
                <thead class="thead-inverse">
                    <tr>
                        <th class="title">STT</th>
                        <th class="title">Tên sản phẩm</th>
                        <th class="title">Hình ảnh</th>
                        <th class="title">Đơn giá (đ)</th>
                        <th class="title">Phần trăm khuyến mãi</th>
                        <th class="title">Giá mới (đ)</th>
                        <th class="title">Số lượng</th>
                        <th class="title">Thành tiền (đ)</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($order_detail as $r)
                    <p></p>
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Tên sản phẩm"  style="text-align:left">{{$r->product->ProductName}}</td>
                        <td data-label="Hình ảnh"> <img src="{{asset('/storage/img'.'/'.$r->product->Picture)}}" width="80px" alt="" > </td>
                        <td data-label="Đơn giá(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->product->Price) }}</td>
                        <td data-label="Phần trăm" style="color:red; font-weight:bold">{{ 100 - ((($r->UnitPrice*$r->Quantity)*100)/($r->product->Price*$r->Quantity)) }} %</td>
                        <td data-label="Giá mới(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->UnitPrice)  }}</td>
                        <td data-label="Số lượng">{{ $r->Quantity }}</td>
                        <td data-label="Thành tiền(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->UnitPrice*$r->Quantity) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection