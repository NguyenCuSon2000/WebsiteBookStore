@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách sản phẩm khuyến mãi</p>
<div class="right__search">
    <form role="form" action="/search_discount" method="get">
        @csrf
        <input  style="width: 250px;" type="search" class="search" name="txtSearch" id="" placeholder="Tìm theo mã, tên sách, phần trăm, ngày bắt đầu, ngày kết thúc, ngày nhập" title="Tìm theo mã, tên sách, phần trăm, ngày bắt đầu, ngày kết thúc, ngày nhập">
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo mã, tên sách, phần trăm, ngày bắt đầu, ngày kết thúc, ngày nhập">
    </form>
</div>  
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
                    <th>Mã khuyến mãi</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá gốc (VNĐ)</th>
                    <th>Phần trăm</th>
                    <th>Giá khuyến mãi (VNĐ)</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Ngày nhập</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="STT">{{$r->id}}</td>
                        <td data-label="Tên sản phẩm" style="text-align:left">{{$r->product->ProductName}}</td>
                        <td data-label="Giá gốc(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format( $r->product->Price )}}</td>
                        <td data-label="Phần trăm">{{ $r->Percent }}</td>
                        <td data-label="Giá khuyến mãi(đ)" style="color:red; font-weight:bold; text-align:right">{{ number_format($r->product->Price * (100 - $r->Percent)/100)  }}</td>
                        <td data-label="Ngày bắt đầu" >{{ \Carbon\Carbon::parse($r->BeginDate)->format('d/m/Y') }}</td>
                        <td data-label="Ngày kết thúc">{{ \Carbon\Carbon::parse($r->EndDate)->format('d/m/Y') }}</td>
                        <td data-label="Ngày nhập">{{ \Carbon\Carbon::parse($r->AddDate)->format('d/m/Y') }}</td>
                        <td data-label="Hiển thị">
                            @if( $r->Status == 0)
                                 <a href="#" class="label label-warning">Ẩn</a>
                            @else
                                <a href="#" class="label-success label">Hiển Thị</a>
                            @endif
                        </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('discount.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('discount.destroy', $r->id) }}" method="post">
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
    {{ $db->links() }}
</div>
@endsection