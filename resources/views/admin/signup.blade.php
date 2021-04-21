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
               <div class="alert alert-danger" style="color: red">
                   @foreach($errors->all() as $error)
                       {{$error}}
                   @endforeach
               </div>
            @endif
            <header>SignUp Form</header>
            <form action="{{ route('/register') }}" name="formSignUp" id="SignUp" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="field email">
                    <span class="fas fa-envelope"></span>
                    <input type="email" required="" placeholder="Email" id="email" name="email" require>
                </div>
                <span id="IDemail" style="color:#FF0000; font-size:18px"></span>

                <div class="field space">
                    <span class="fa fa-user"></span>
                    <input type="text" required="" placeholder="Tên người dùng" id="txtus" name="username" require>
                </div>
               

                <div class="field space">
                    <span class="fas fa-map-marker-alt"></span>
                    <input type="text" required="" placeholder="Địa chỉ" id="txtsd" name="txtad" require>
                </div>
             
                <div class="field space">
                    <span class="fas fa-phone-alt"></span>
                    <input type="text" required="" placeholder="Số điện thoại" id="txtsdt" name="txtsdt" require>
                </div>
                
           
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="password" name="password" class="pass-key" required="" placeholder="Mật khẩu" require>
                </div>
               

                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="re_password" name="re_password" class="pass-key" required="" placeholder="Nhập lại mật khẩu" require>
                </div>
                
                <div class="pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" value="SIGN UP">
                </div>
            </form>
            <div class="login">
                Or SignUp with
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
                Don't have account?
                <a href="{{ route('/login/index') }}">Login Now</a>
            </div>
        </div>
    </div> 
</body>
</html>