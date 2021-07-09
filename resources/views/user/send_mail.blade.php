<!doctype html>
<html lang="en">
  <head>
    <title>Gửi mail google</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     
      <h4>Gửi đến: {{$c_email}}</h4>
      <h4>Ngày đặt: {{\Carbon\Carbon::parse($order_date)->format('d/m/Y')}}</h4>
      <h4>Người đặt: {{$c_name}}</h4>
      <h4>Số điện thoại: {{$c_phone}}</h4>
      <h4>Địa chỉ nhận: {{$c_address}}</h4>
      <h4>Thông tin đơn hàng</h4>
      @php
          $tt = 1
      @endphp 
      <table border="1" cellspacing="0" cellspadding="10">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá (đ)</th>
                    <th>Số lượng</th>
                    <th>Thành tiền (đ)</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($cart as $r)
                <tr>
                    <td style="text-align:center">{{ $tt++ }}</td>
                    <td data-label="Tên sản phẩm"  style="text-align:left">{{$r->name}}</td>
                    <td data-label="Đơn giá" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->price)  }}</td>
                    <td data-label="Số lượng" style="text-align:center">{{ $r->qty }}</td>
                    <td data-label="Thành tiền" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->price * $r->qty) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight:bold">Tổng tiền</td>
                    <td style="color:red; font-weight:bold; text-align:right">{{ $total }} đ</td>
                </tr>
            </tbody>
        </table>
        <h4 style="font-style: italic;">Xem lại lịch sử đặt hàng tại: <a target="_blank" href="{{ route('history') }}">lịch sử đơn hàng</a></h4>
        <h4 style="font-style: italic;">Xin cảm ơn quý khách đã đặt hàng của cửa hàng sách Book Store chúng tôi.</h4>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>