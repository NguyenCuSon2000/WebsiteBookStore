@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách sản phẩm</p>
<div class="right__search">
    <form role="form" action="/search_product" method="get">
        @csrf
        <input style="width: 250px;" type="search" class="search" name="txtSearch" id="" placeholder="Tìm theo mã sách, tên sách, tên loại, giá" title="Tìm theo mã sách, tên sách, tên loại, giá">
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo mã sách, tên sách, tên loại, giá">
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
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Tên loại</th>
                    <th>Số lượng tồn</th>
                    <th>Đơn giá (VNĐ)</th>
                    <th>Hình ảnh</th>
                    <th>Hiển thị</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($db as $r)
                    <tr>
                        <td data-label="STT">{{ $tt++}}</td>
                        <td data-label="Mã sách">{{$r->id}}</td>
                        <td data-label="Tiêu đề" style="text-align:left">{{$r->ProductName}}</td>
                        <td data-label="Tên loại" style="text-align:left">{{ $r->category->CategoryName }}</td>
                        <td data-label="Số lượng tồn">{{ $r->Quantity }}</td>
                        <td data-label="Đơn giá(đ)" style="color:red; font-weight:bold; text-align:right"> {{ number_format($r->Price) }}</td>
                        <td data-label="Xem hình ảnh" class="right__iconTable">
                              <a  data-id ="{{ $r->id }}" href="{{ route('product.show', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                        <td data-label="Hiển thị">
                            <!-- <input type="checkbox" name="cbtt" value="{{ $r->Status }}" {{ $r->Status==0?'':'checked'}}> -->
                            @if( $r->Status == 0)
                                 <a href="#" class="label label-warning">Ẩn</a>
                            @else
                                <a href="#" class="label-success label">Hiển Thị</a>
                            @endif
                         </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('product.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('product.destroy', $r->id) }}" method="post">
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
    {{$db->links()}}
</div>

<div class="card bg-light mt-3">
    <div class="card-header">
        Nhập và xuất ra Excel
    </div>
    <div class="card-body">
        <form action="{{ route('import_products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Nhập dữ liệu sản phẩm</button>
            <a class="btn btn-warning" href="{{ route('export_products') }}">Xuất dữ liệu sản phẩm</a>
        </form>
    </div>
</div>

@endsection

