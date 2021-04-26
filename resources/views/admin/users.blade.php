@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Xem người dùng</p>
<div class="right__search">
    <form role="form" action="/search_user" method="get">
       @csrf
        <input type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm kiếm" >
        <input type="submit" class="button" value="Search">
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
        $tt = 0;
    @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>UserName</th>
                    <!-- <th>Password</th> -->
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Username">{{ $r->username }}</td>
                        <!-- <td data-label="Password">{{ $r->password }}</td> -->
                        <td data-label="Email">{{ $r->email }}</td>
                        <td data-label="Số điện thoại">{{ $r->phone}}</td>
                        <td data-label="Địa chỉ">{{ $r->address}}</td>
                        <td data-label="Trạng thái"><input type="checkbox" name="cbtt" value="{{ $r->Status }}" {{ $r->Status==0?'':'checked'}}  ></td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('user.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('user.destroy', $r->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button  type="submit" onclick="return confirm('Are you sure to delete?')"><img src="{{ asset('assets/icon-trash-black.svg') }}" alt=""></button>   
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