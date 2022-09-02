@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Xem hình ảnh</p>
<!-- <div class="right__search">
    <form role="form" action="/search_category" method="get">
       @csrf
        <input type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm kiếm" >
        <input type="submit" class="button" value="Search">
    </form>
</div>    -->
 
<div class="right__table">
    <div class="right__tableWrapper">
    @php
        $tt = 0;
    @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã ảnh</th>
                    <th>Tên sách</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($pictures as $r)
                    <tr>
                        <td data-label="STT">{{ $tt++ }}</td>
                        <td data-label="Mã ảnh">{{$r->id}}</td>
                        <td data-label="Tên sách">{{$r->product->ProductName}}</td>
                        <td data-label="Hình ảnh"> <img src="{{asset('/storage/img'.'/'.$r->picture)}}" alt="" > </td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('picture.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('picture.destroy', $r->id) }}" method="post">
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
  
</div>
@endsection