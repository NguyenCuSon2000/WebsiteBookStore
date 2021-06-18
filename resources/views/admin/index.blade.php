@extends("layouts.admin")
@section('admin_content')

<div class="right__title">Bảng điều khiển</div>
    <p class="right__desc">Bảng điều khiển</p>
    <div class="right__cards">
        <a class="right__card" href="{{ route('product.index') }}">
            <div class="right__cardTitle">Sản Phẩm</div>
            <div class="right__cardNumber">{{ $count_product }}</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
        </a>
        <a class="right__card" href="{{ route('customer.index') }}">
            <div class="right__cardTitle">Khách Hàng</div>
            <div class="right__cardNumber">{{ $count_customer }}</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
        </a>
        <a class="right__card" href="{{ route('category.index') }}">
            <div class="right__cardTitle">Loại sách</div>
            <div class="right__cardNumber">{{ $count_category}}</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
        </a>
        <a class="right__card" href="{{ route('order.index') }}">
            <div class="right__cardTitle">Đơn Hàng</div>
            <div class="right__cardNumber">{{ $count_order }}</div>
            <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
        </a>
    </div>
    <div class="right__table">
        <p class="right__tableTitle">Đơn hàng mới</p>
        <div class="right__tableWrapper">
            <table style="text-align: center;">
                @php
                    $tt = 1
                @endphp
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiên (VNĐ)</th>
                        <th>Ngày đặt</th>
                        <th>Trạng Thái</th>
                        <th>In hóa đơn</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($order_new as $order)
                    <tr>
                        <td data-label="STT">{{ $tt++ }}</td>
                        <td data-label="Tên khách hàng" style="text-align:left">{{ $order->customer->CustomerName}}</td>
                        <td data-label="Số điện thoại">{{ $order->ShipPhone }}</td>
                        <td data-label="Địa chỉ" style="text-align:left">{{ $order->ShipAddress }}</td>
                        <td data-label="Tổng tiền" style="color:red; font-weight:bold; text-align:right">{{ number_format($order->total) }}</td>
                        <td data-label="Ngày đặt">{{ \Carbon\Carbon::parse($order->OrderDate)->format('d/m/Y') }}</td>
                        <td data-label="Trạng Thái">
                             @if( $order->Status == 0)
                                <a href="#" class="label label-warning">Chờ xử lý</a>
                            @else
                                  <a href="#" class="label-success label">Đã xử lý</a>
                            @endif
                        </td>
                        <td>
                             <a target="_blank" href="{{ route('print_order', $order->id) }}" class="label-info label">In hóa đơn</a>
                        </td>
                        <td data-label="Xem chi tiết" class="right__iconTable">
                              <a  data-id ="{{ $order->id }}" href="{{ route('order.show', $order->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('order.index') }}" class="right__tableMore"><p>Xem tất cả các đơn đặt hàng</p> <img src="{{asset('assets/arrow-right-black.svg')}}" alt=""></a>
    </div>
@endsection