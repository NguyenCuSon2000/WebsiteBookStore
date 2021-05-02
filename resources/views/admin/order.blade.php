@if($order)
<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xoá</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($order as $r)
        <tr>
            <td>{{ $tt++ }}</td>
            <td data-label="Tên sản phẩm">{{$r->product->ProductName}}</td>
            <td data-label="Hình ảnh"> <img src="{{asset('img'.'/'.$r->Picture)}}" alt="" > </td>
            <td data-label="Đơn giá">{{ $r->product->Price }}</td>
            <td data-label="Số lượng">{{ $r->Quantity }}</td>
            <td data-label="Thành tiền">{{ $r->UnitPrice }}</td>
            <td data-label="Xoá" class="right__iconTable">
                <form role="form" action="" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button  type="submit" onclick="return confirm('Are you sure to delete?')"><img src="{{ asset('assets/icon-trash-black.svg') }}" alt=""></button>   
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif