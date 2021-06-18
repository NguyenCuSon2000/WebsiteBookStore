@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê số lượng đơn hàng hàng tháng</p>
<div class="container">
    <form action="" id="form_count" method="get">
        <div class="form-group">
            <label for="">Năm</label>
            <select class="count form-control form-control-sm" name="year">
              <option {{ Request::get('year') == "2021" || !Request::get('year') ? "selected='selected'" : "" }} value="2021" selected>2021</option>
              <option {{ Request::get('year') == "2022" ? "selected='selected'" : "" }} value="2022">2022</option>
              <option {{ Request::get('year') == "2023" ? "selected='selected'" : "" }} value="2023">2023</option>
              <option {{ Request::get('year') == "2024" ? "selected='selected'" : "" }} value="2024">2024</option>
              <option {{ Request::get('year') == "2025" ? "selected='selected'" : "" }} value="2025">2025</option>
              <option {{ Request::get('year') == "2026" ? "selected='selected'" : "" }} value="2026">2026</option>
              <option {{ Request::get('year') == "2027" ? "selected='selected'" : "" }} value="2027">2027</option>
              <option {{ Request::get('year') == "2028" ? "selected='selected'" : "" }} value="2028">2028</option>
              <option {{ Request::get('year') == "2029" ? "selected='selected'" : "" }} value="2029">2029</option>
              <option {{ Request::get('year') == "2030" ? "selected='selected'" : "" }} value="2030">2030</option>
            </select>
          </div>
    </form>
    <p style="font-size: 18px;">Tổng số đơn hàng năm {{ $year }}: 
        <span style="font-weight: bold;">{{ number_format($order_quantity_year)}} </span> 
    </p>
    <div class="row">
        @foreach($list_count as $value)
        <div class="col-sm-3">
            <div class="right__cards statistic">
                <a class="right__card" href="/statistic/order_list/{{$value['month']}}/{{ $year }}">
                    <div class="right__cardTitle">Tháng {{$value['month']}}</div>
                    <div class="right__cardNumber">{{ number_format($value['order_count'])}} </div>
                    <div class="right__cardDesc">Xem Chi Tiết <img src="{{asset('assets/arrow-right.svg')}}" alt=""></div>
                </a>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
@endsection
