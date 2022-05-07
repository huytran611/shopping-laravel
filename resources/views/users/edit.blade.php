<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;500;600&family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Đăng ký tài khoản</title>
    <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
      
      button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }
      
      button:hover {
        opacity: 0.8;
      }
      
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }
      
      .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
      }
      
      
      .container {
        padding: 16px;
      }
      
      span.psw {
        float: right;
        padding-top: 16px;
      }
      
      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
        span.psw {
           display: block;
           float: none;
        }
        .cancelbtn {
           width: 100%;
        }
      }
      </style>
</head>
<body>
    <form action="/users/update/{{$user->id}}" method="post">
        @csrf
        <h2 style="text-align: center; margin-top:50px;">Chỉnh sửa hồ sơ</h2>
            <div class="container">

            <label for="uname"><b>Tên tài khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản của bạn" name="name" value="{{ $user->name}}" required>
                
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" name="email" value="{{$user->email}}" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" value="{{$user->password}}" required>
                
            <button type="submit">Submit</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            </div>
        
            <div class="container">
            <a href="account.php"><button type="button" class="cancelbtn">Đăng nhập</button></a>
            <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
  </form>
</body>
</html>