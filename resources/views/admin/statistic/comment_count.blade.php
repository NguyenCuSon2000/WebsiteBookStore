@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Thống kê sản phẩm đánh giá nổi bật</p>
<!-- <div class="right__search">
    <form role="form" action="/search_product" method="get">
        @csrf
        <input type="search" class="search" name="txtSearch" id="" placeholder="Tìm kiếm" >
        <input type="submit" class="button" value="Search">
    </form>
</div>   -->
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
                    <th>Số lượng đánh giá</th>
                    <th>Hình ảnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comment_count as $r)
                    <tr>
                        <td data-label="STT">{{ $tt++}}</td>
                        <td data-label="Tên sảm phẩm" style="text-align:left">{{$r->product->ProductName}}</td>
                        <td data-label="Số lượng đánh giá" >{{$r->amount}}</td>
                        <td data-label="Xem hình ảnh" class="right__iconTable">
                            <a  data-id ="{{ $r->product->id }}" href="{{ route('product.show', $r->product->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
    {{$comment_count->links()}}
</div>
@endsection