@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Xem danh mục</p>
<div class="right__table">
    <div class="right__tableWrapper">
        @php 
            $tt = 0;
        @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ProductId</th>
                    <th>Tiêu đề</th>
                    <th>Tên loại</th>
                    <th>Mô tả</th>
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
                        <td data-label="id">{{$r->id}}</td>
                        <td data-label="Tiêu đề">{{$r->ProductName}}</td>
                        <td data-label="Tên loại">{{ $r->category->CategoryName }}</td>
                        <td data-label="Mô tả">{{$r->Description}}</td>
                        <td data-label="Hình ảnh"> <img src="{{asset('img'.'/'.$r->Picture)}}" alt="" > </td>
                        <td data-label="Hiển thị"><input type="checkbox" name="cbtt" value="{{ $r->Status }}" {{ $r->Status==0?'':'checked'}}  ></td>
                        <td data-label="Sửa" class="right__iconTable"><a href="{{ route('product.edit', $r->id) }}"><img src="{{asset('assets/icon-edit.svg')}}" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('product.destroy', $r->id) }}" method="post">
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
@endsection