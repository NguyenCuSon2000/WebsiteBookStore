@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Xem chi tiết đơn hàng</p>
  
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
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá (VNĐ)</th>
                    <th>Số lượng</th>
                    <th>Thành tiền (VNĐ)</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($order_details as $r)
                <tr>
                    <td>{{ $tt++ }}</td>
                    <td data-label="Tên sản phẩm"  style="text-align:left">{{$r->product->ProductName}}</td>
                    <td data-label="Hình ảnh"> <img src="{{asset('img'.'/'.$r->product->Picture)}}" alt="" > </td>
                    <td data-label="Đơn giá" style="color:red; font-weight:bold; text-align:right">{{ $r->product->Price }}</td>
                    <td data-label="Số lượng">{{ $r->Quantity }}</td>
                    <td data-label="Thành tiền" style="color:red; font-weight:bold; text-align:right">{{ $r->UnitPrice*$r->Quantity }}</td>
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
