@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách đơn hàng tháng {{ $month }}/{{ $year }}</p>
 
<?php
    use Illuminate\Support\Facades\Session;
    $message = Session::get('message');
    if($message){
        echo '<span style="color: red">'.$message.'</span>';
        Session::put('message',null);
    }
?>   
  <p style="font-size: 18px;">Tổng doanh thu tháng {{ $month }}/{{ $year }}: 
        <span style="color: red; font-weight: bold;">{{ number_format($order_total_year).' '.'đ' }} </span> 
    </p>
    <p style="font-size: 18px;">Tổng đơn hàng tháng {{ $month }}/{{ $year }}: 
        <span style="color: red; font-weight: bold;">{{ number_format($order_qty_year) }} </span> 
    </p>
<div class="right__table">
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
                    <th>In hóa đơn</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($order_list as  $r)
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
                            @if( $r->Status == 0)
                                 <a href="#" class="label label-warning">Chờ xử lý</a>
                            @else
                                <a href="#" class="label-success label">Đã xử lý</a>
                            @endif
                        </td>
                        <td>
                             <a target="_blank" href="{{ route('print_order', $r->id) }}" class="label-info label">In hóa đơn</a>
                        </td>
                        <td data-label="Xem" class="right__iconTable">
                              <a  data-id ="{{ $r->id }}" href="{{ route('order.show', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('order.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('order.destroy', $r->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><img src="{{ asset('assets/icon-trash.svg') }}" alt=""></button>   
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    {{ $order_list->links() }}
</div>


@endsection
