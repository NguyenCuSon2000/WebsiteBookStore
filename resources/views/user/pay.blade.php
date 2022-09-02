<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <link rel="stylesheet" href="{{ asset('css/pay.css') }}"> -->
<!------ Include the above in your HEAD tag ---------->

@extends('layout')

@section('content')
<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax" style="background: url({{asset('img'.'/'.'banner1.3.jpg')}});">
</section>
<!--slider sec end-->

<div class="about_content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-10  text-center text-lg-left wow slideInUp" data-wow-duration="2s">
                <h1 class="heading">Đặt hàng</h1>
                <p class="para_text">"Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.” <b>- Barack Obama -</b></p>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Danh sách sản phẩm <div class="pull-right"><small><a class="afix-1" href="{{ route('cart.index') }}">Cập nhật</a></small></div>
                        </div>
                        
                        <div class="panel-body">
                            @foreach($cart as $key)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ asset('/storage/img'.'/'.$key->options->img) }}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $key->name }}</div>
                                    <div class="col-xs-12"><small>Số lượng x <span>{{ $key->qty }}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>{{ number_format($key->price)." "."VND"}}</h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            @endforeach
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng phụ</strong>
                                    <div class="pull-right">{{ Cart::subtotal(0,3)." "."VND" }}</div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Giao hàng</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng Tiền</strong>
                                    <div class="pull-right">{{ Cart::subtotal(0,3)." "."VND" }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Thông tin thanh toán</div>
                      
                        <div class="panel-body">
                            @if(count($errors)>0)
                            <div class="alert alert-danger" style="color: red">
                                @foreach($errors->all() as $error)
                                {{$error}}
                                @endforeach
                            </div>
                            @endif
                            <form action="{{ route('checkout') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <!-- <input type="text" name="txtid" class="form-control" value="<?php echo Session::get('user_id') ?>" /> -->
                                        <input type="hidden" name="txtid" class="form-control" value="{{Auth::id()}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <strong>Tên khách hàng:</strong><span style="color: red">*</span>
                                        <input type="text" name="txtName" pattern="^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌÓỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$" class="form-control form-control-sm @error('txtName') is-invalid @enderror" value="{{Auth::user()->username }}"  required autocomplete="txtName" autofocus />
                                        @error('txtName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                 
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <strong>Ngày sinh:</strong><span style="color: red">*</span>
                                        <input type="date" name="txtDate" class="form-control form-control-sm" value="" required />
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Tỉnh/Thành phố:</strong><span style="color: red">*</span>
                                        <select class="form-control form-control-sm" name="province" id="province" required>
                                            <option value="">--- Chọn tỉnh/thành phố ---</option>
                                        </select>
                                        <input type="hidden" name="province" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <strong>Huyện/Thị trấn:</strong><span style="color: red">*</span>
                                        <select class="form-control form-control-sm" name="district" id="district" required>
                                            <option value="">--- Chọn quận huyện ---</option>
                                        </select>
                                        <input type="hidden" name="district" >
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Xã/Quận:</strong><span style="color: red">*</span>
                                        <select class="form-control form-control-sm" name="ward" id="ward" required>
                                             <option value="">--- Chọn xã, thị trấn ---</option>
                                        </select>
                                        <input type="hidden" name="ward" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ nhận chi tiết:</strong><span style="color: red">*</span></div>
                                    <div class="col-md-12">
                                        <input type="text" required name="txtad" class="form-control form-control-sm @error('txtad') is-invalid @enderror"  value="{{ old('txtad') }}" required autocomplete="txtad" autofocus />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <strong>Số điện thoại:</strong><span style="color: red">*</span>
                                        <input type="text" pattern="[0-9]{10}" name="txtPhone" class="form-control form-control-sm @error('txtPhone') is-invalid @enderror" value="{{ old('txtPhone') }}" required autocomplete="txtPhone" autofocus />
                                        @error('txtPhone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Email:</strong><span style="color: red">*</span>
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  name="txtEmail" class="form-control form-control-sm @error('txtEmail') is-invalid @enderror"  autocomplete="txtEmail" value="{{ Auth::user()->email }}" autofocus required />
                                        @error('txtEmail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú:</strong></div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="txtNote" id="" rows="3" ></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="form-control btn btn-success" value="">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
            </form>
        </div>
        <div class="row cart-footer">
            
        </div>
    </div>
</div>

@endsection


