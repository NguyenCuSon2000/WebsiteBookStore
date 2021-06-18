@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Quản lý quyền người dùng</p>
<div class="right__search">
    <form role="form" action="/search_role" method="get">
       @csrf
        <input  style="width: 250px;" type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm theo tên quyền" >
        <input type="submit" class="button" value="Tìm kiếm">
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
                    <th>Mã quyền</th>
                    <th>Tên quyền</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Mã">{{ $r->id }}</td>
                        <td data-label="name" style="text-align:left">{{ $r->name }}</td>
                        <td data-label="Ngày tạo">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}</td>
                        <td data-label="Trạng thái">
                           @if( $r->status == 0)
                                 <a href="#" class="label label-warning">Ngừng</a>
                            @else
                                <a href="#" class="label-success label">Hoạt Động</a>
                            @endif
                        </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('role.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('role.destroy', $r->id) }}" method="post">
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