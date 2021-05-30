@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật quyền người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('role.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="title">Quyền</label>
            <input type="text"  class="form-control" value="{{ $db->name }}" name="txtName" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_role">Trạng thái</label>
            <select name="sl_stt"  class="form-control form-control-sm">
                <!-- <option disabled selected>Chọn trạng thái</option> -->
                <option value="0" {{ $db->status==0?"":"selected"}}>Ngừng</option>
                <option value="1" {{ $db->status==0?"":"selected"}}>Hoại Động</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection