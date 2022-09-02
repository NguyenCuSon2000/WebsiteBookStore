@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Danh sách khách hàng</p>
<div class="right__search">
    <form role="form" action="/search_customer" method="get">
        @csrf
        <input style="width: 250px;"  type="search" class="search" name="txtSearch" id="" placeholder="Tìm theo mã, tên, ngày sinh, địa chỉ, số điện thoại, email" title="Tìm theo mã, tên, ngày sinh, địa chỉ, số điện thoại, email">
        <input type="submit" class="button" value="Tìm kiếm" title="Tìm theo mã, tên, ngày sinh, địa chỉ, số điện thoại, email">
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
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Mã khách hàng">{{$r->id}}</td>
                        <td data-label="Tên khách hàng" style="text-align:left">{{$r->CustomerName}}</td>
                        <td data-label="Ngày sinh">{{ \Carbon\Carbon::parse($r->DateOfBirth)->format('d/m/Y') }}</td>
                        <td data-label="Địa chỉ" style="text-align:left">{{$r->Address}}</td>
                        <td data-label="SDT">{{$r->Phone}}</td>
                        <td data-label="Email" style="text-align:left">{{$r->Email}}</td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('customer.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('customer.destroy', $r->id) }}" method="post">
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