@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách tin tức</p>
<div class="right__search">
    <form role="form" action="/search_new" method="get">
        @csrf
        <input  style="width: 250px;" type="search" class="search" name="txtSearch" id="" placeholder="Tìm theo mã, tiêu đề, mô tả, nội dung, ngày đăng" title="Tìm theo mã, tiêu đề, mô tả, nội dung, ngày đăng">
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo mã, tiêu đề, mô tả, nội dung, ngày đăng">
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
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Ngày đăng</th>
                    <th>Hình ảnh</th>
                    <th>Hiển thị</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Tiêu đề" style="text-align:left">{{$r->title}}</td>
                        <td data-label="Mô tả" style="text-align:left">{{$r->description}}</td>
                        <td data-label="Ngày đăng">{{ \Carbon\Carbon::parse($r->date)->format('d/m/Y') }}</td>
                        <td data-label="Hình ảnh"> <img src="{{asset('img'.'/'.$r->picture)}}" alt="" > </td>
                        <td data-label="Hiển thị">
                        <!-- <input type="checkbox" name="cbtt" value="{{ $r->status }}" {{ $r->status==0?'':'checked'}}  > -->
                            @if( $r->status == 0)
                                    <a href="#" class="label label-warning">Ẩn</a>
                                @else
                                    <a href="#" class="label-success label">Hiển Thị</a>
                                @endif
                        </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('news.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('news.destroy', $r->id) }}" method="post">
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
@endsection