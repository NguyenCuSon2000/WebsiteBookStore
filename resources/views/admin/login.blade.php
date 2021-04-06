<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/Login.css')}}">
   
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            <header>Login Form</header>
            <form action="{{ route('/login') }}" method="post">
                {{ csrf_field() }}
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" required="" name="username" placeholder="Username">
                </div>
                <span id="IDemail" style="color:#FF0000; font-size:18px"></span>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="pass-key" required="" placeholder="Password">
                </div>
                <div class="rememberpass">
                    
                </div>
                <div class="pass">
                    <span><input type="checkbox" name="" value="" id="">Remember password</span> 
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
            <div class="login">
                Or login with
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
                <a href="SignUp.html">Signup Now</a>
            </div>
        </div>
    </div> 
</body>
</html>