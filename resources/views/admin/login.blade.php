<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Login Form</title>
  
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

  <link rel="stylesheet" href="{{URL::asset('public/admin/login.css')}}">

  
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
       
      <form action="{{route('post.login')}}" method="post"
        enctype="multipart/form-data">
        @if(session('status'))
            <p style="color:red">{{session('status')}}</p>
            @endif
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="username" autofocus="true" required="required">
                    @if($errors->first('username'))
                            <p class="text-danger">{{$errors->first('username')}}</p>
                        @endif
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" name="password" data-type="password" autofocus="true" required="required">
                     @if($errors->first('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Forgot Password?</a>
                </div>
            </div>
            
        </div>
      </form>  
    </div>
</div>
  
  
</body>
</html>
