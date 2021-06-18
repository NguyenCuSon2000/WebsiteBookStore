@extends('layouts.admin')
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Cập nhật người dùng</p>
<div class="right__formWrapper">
    <form role="form" action="{{ route('user.update', $db->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="right__inputWrapper">
            <label for="title">UserName</label>
            <input type="text" class="form-control" name="txtName" value="{{ $db->username }}" placeholder="UserName" required>
        </div>
        <div class="right__inputWrapper">
            <label for="date">Password</label>
            <input type="text" class="form-control" value="{{ $db->password }}" name="txtpw" id="" required>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Quyền</label>
            <select name="sl_role" class="form-control form-control-sm">
                <option value="{{ $db->role->id }}" selected>{{ $db->role->name }}</option>
                @foreach($role as $r)
                     <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="right__inputWrapper">
            <label for="p_category">Trạng thái</label>
            <select name="slstt" class="form-control form-control-sm">
                <option value="0" {{ $db->status==0?"":"selected"}}>Ngừng</option>
                <option value="1" {{ $db->status==0?"":"selected"}}>Hoạt Động</option>
            </select>
        </div>
        <button class="btn btn-info" type="submit">Cập nhật</button>
    </form>
</div>
@endsection