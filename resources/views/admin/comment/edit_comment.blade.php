@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật bình luận</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('comment.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="p_category">Tên sách</label>
            <select name="txtProduct" class="form-control form-control-sm">
                <option value="{{ $db->product->id }}" selected>{{ $db->product->ProductName }}</option>
                @foreach($products as $r)
                     <option value="{{ $r->id }}">{{ $r->ProductName }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="title">Người bình luận</label>
            <input type="text" class="form-control" name="txtName" value="{{ $db->name }}" placeholder="Người bình luận">
        </div>
        <div class="right__inputWrapper">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="txtEmail" value="{{ $db->email }}" placeholder="Email">
        </div>
        <div class="right__inputWrapper">
            <label for="date">Nội dung</label>
            <textarea class="form-control" name="txtContent" id="" rows="3">{{ $db->content }}</textarea>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection