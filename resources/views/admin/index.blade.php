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
                        <th>Số Hoá Đơn</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach($order_new as $order)
                    <tr>
                        <td data-label="STT">{{ $tt++ }}</td>
                        <td data-label="Tên khách hàng">{{ $order->customer->CustomerName}}</td>
                        <td data-label="Số điện thoại">{{ $order->ShipPhone }}</td>
                        <td data-label="Địa chỉ">{{ $order->ShipAddress }}</td>
                        <td data-label="Số Hoá Đơn">{{ $order->id }}</td>
                        <td data-label="Trạng Thái">
                             @if( $order->Status == 1)
                                <a href="#" class="label-success label">Đã xử lý</a>
                            @else
                                <a href="#" class="label label-defaul">Chờ xử lý</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    <!-- <tr>
                        <td data-label="STT">2</td>
                        <td data-label="Email" style="text-align: left;">caothaison@gmail.com</td>
                        <td data-label="Số Hoá Đơn">4578644</td>
                        <td data-label="ID Sản Phẩm">4</td>
                        <td data-label="Số Lượng">2</td>
                        <td data-label="Kích thước">Nhỏ</td>
                        <td data-label="Trạng Thái"> 
                            Đang Xử Lý
                        </td>
                    </tr>
                    <tr>
                        <td data-label="STT">3</td>
                        <td data-label="Email" style="text-align: left;">tranmanhthai@gmail.com</td>
                        <td data-label="Số Hoá Đơn">2657544</td>
                        <td data-label="ID Sản Phẩm">3</td>
                        <td data-label="Số Lượng">5</td>
                        <td data-label="Kích thước">Lớn</td>
                        <td data-label="Trạng Thái"> 
                            Đang Xử Lý
                        </td>
                    </tr>
                    <tr>
                        <td data-label="STT">4</td>
                        <td data-label="Email" style="text-align: left;">nguyenthihang@gmail.com</td>
                        <td data-label="Số Hoá Đơn">9659544</td>
                        <td data-label="ID Sản Phẩm">8</td>
                        <td data-label="Số Lượng">12</td>
                        <td data-label="Kích thước">Trung Bình</td>
                        <td data-label="Trạng Thái"> 
                            Đang Xử Lý
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <a href="" class="right__tableMore"><p>Xem tất cả các đơn đặt hàng</p> <img src="{{asset('assets/arrow-right-black.svg')}}" alt=""></a>
    </div>
@endsection