<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    <script src=" https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert" style="color: red">'.$message.'</span>';
                    Session::put('message',null);
                }
            ?>
            @if(count($errors)>0)
               <!-- <div class="alert alert-danger" style="color: red">
                   @foreach($errors->all() as $error)
                       {{$error}}
                   @endforeach
               </div>
            @endif -->
            <header>Đăng Ký</header>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field space">
                    <span class="fa fa-user"></span>
                    <input id="username" type="email" class="form-control @error('username') is-invalid @enderror" placeholder="Email" name="username" value="{{ old('username') }}" required autocomplete="username">
                    <!-- @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror -->
                </div>
                @error('username')
                     <span style="color:#FF0000; font-size:18px">{{ $message }}</span>
                 @enderror
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu" name="password" required autocomplete="new-password">
                    
                </div>
                @error('password')
                     <span style="color:#FF0000; font-size:18px">{{ $message }}</span>
                 @enderror
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required autocomplete="new-password">
                </div>
                @error('password')
                     <span style="color:#FF0000; font-size:18px">{{ $message }}</span>
                 @enderror
                <div class="pass">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="field">
                    <input type="submit" value="Đăng Ký">
                </div>
            </form>
            <div class="login">
                Hoặc Đăng nhập với
            </div>
            <div class="links">
                <div class="facebook">
                    <i class="fab fa-facebook-f"><span>Facebook</span></i>
                </div>
                <div class="google">
                    <i class="fab fa-google"><span>Google</span></i>
                </div>
            </div>
            <div class="signup">
                Đã có tài khoản?
                <a href="{{ route('get_login_order') }}">Đăng nhập ngay</a>
            </div>
        </div>
    </div> 
</body>
</html>