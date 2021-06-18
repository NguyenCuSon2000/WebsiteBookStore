@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách thông tin liên hệ</p>
<div class="right__search">
    <form role="form" action="/search_contact" method="get">
       @csrf
        <input style="width: 250px;" type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm theo tên người liên hệ, email, địa chỉ, tiêu đề, nội dung" title="Tìm theo tên người liên hệ, email, địa chỉ, tiêu đề, nội dung">
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo tên người liên hệ, email, địa chỉ, tiêu đề, nội dung">
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
                    <th>Tên người liên hệ</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày liên hệ</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td data-label="STT">{{ $tt++ }}</td>
                        <td data-label="Tên người liên hệ" style="text-align:left">{{ $r->name }}</td>
                        <td data-label="Email" style="text-align:left">{{ $r->email }}</td>
                        <td data-label="Địa chỉ" style="text-align:left">{{ $r->address }}</td>
                        <td data-label="Tiêu đề" style="text-align:left">{{ $r->title }}</td>
                        <td data-label="Nội dung" style="text-align:left">{{ $r->content }}</td>
                        <td data-label="Ngày liên hệ">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</td>
                        <td data-label="Trạng thái">
                            @if( $r->status == 0)
                                <a href="#" class="label-warning label">Chờ xử lý</a>
                            @else
                                <a href="#" class="label label-success">Đã xử lý</a>
                            @endif
                        </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('contact_admin.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('contact_admin.destroy', $r->id) }}" method="post">
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
    {{ $db->links() }}
</div>
@endsection
