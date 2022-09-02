@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Quản lý bình luận</p>
<div class="right__search">
    <form role="form" action="/search_comment" method="get">
       @csrf
        <input style="width: 250px;" type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm theo tên người bình luận, tên sách, email, nội dung" title="Tìm theo tên người bình luận, tên sách, email, nội dung" >
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo tên người bình luận, tên sách, email, nội dung">
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
                    <th>Tên sách</th>
                    <th>Người bình luận</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Tên sách" style="text-align:left">{{ $r->product->ProductName }}</td>
                        <td data-label="Người bình luận" style="text-align:left">{{ $r->name }}</td>
                        <td data-label="Email" style="text-align:left">{{ $r->email}}</td>
                        <td data-label="Nội dung" style="text-align:left">{{ $r->content}}</td>
                        <td data-label="Ngày bình luận">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('comment.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('comment.destroy', $r->id) }}" method="post">
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
    {{ $db->links() }}
</div>
@endsection