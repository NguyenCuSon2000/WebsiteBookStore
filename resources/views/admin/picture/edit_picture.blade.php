@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật sản phẩm</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('picture.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="p_category">Tên sách</label>
            <select name="txtName"  class="form-control form-control-sm">
                <option value="{{ $db->product->id }}" selected>{{ $db->product->ProductName }}</option>
                @foreach($products as $r)
                     <option value="{{ $r->id }}">{{ $r->ProductName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" value="{{ $db->picture }}" name="fileImg">
            @if($db->picture)
                 <input type="text" class="form-control" value="{{ $db->picture }}" name="image" hidden>
            @endif
        </div>
        <div class="form-group">
            @if($db->Picture)
                <img src="{{ asset('img'.'/'.$db->picture) }}" height="200" width="200" alt="" />
            @else
                <img src="{{ asset('img'.'/'.$db->picture) }}" height="200" width="200" alt="" />
            @endif
        </div>
        <div class="right__inputWrapper">
            <label for="p_picture">Trạng thái</label>
            <select name="sl_stt" class="form-control form-control-sm">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->status==0?"":"selected"}}>Ẩn</option>
                <option value="1" {{ $db->status==0?"":"selected"}}>Hiển thị</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection