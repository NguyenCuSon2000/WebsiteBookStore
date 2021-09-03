<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/Login.css')}}">
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
            <header>Đăng Nhập</header>
            <form method="POST" action="{{ route('login_order') }}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input id="username" type="email" class="form-control @error('username') is-invalid @enderror" placeholder="Email" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                </div>
                @error('username')
                    <span style="color:#FF0000; font-size:18px">{{ $message }}</span>
                 @enderror
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                         <span style="color:#FF0000; font-size:18px">{{ $message }}</span>
                    </span>
                @enderror
                <div class="rememberpass">
                    
                </div>
                <div class="pass">
                    <span><input type="checkbox" name="" value="" id="" {{ old('remember') ? 'checked' : '' }}>Nhớ mật khẩu</span> 
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    @endif
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
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
                Chưa có tài khoản?
                <a href="{{route('register')}}">Đăng ký ngay</a>
            </div>
        </div>
    </div> 
</body>
</html>