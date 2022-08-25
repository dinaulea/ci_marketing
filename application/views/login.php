<! DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Login  
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
html {   
    height: 100%;   
}  
body {   
    height: 100%;   
}  
.global-container {  
    height: 100%;  
    display: flex;  
    align-items: center;  
    justify-content: center;  
    background-color: #f5f5f5;  
}  
form {  
    padding-top: 10px;  
    font-size: 14px;  
    margin-top: 30px;  
}  
.card-title {   
font-weight: 300;  
 }  
.btn {  
    font-size: 14px;  
    margin-top: 20px;  
}  
.login-form {   
    width: 330px;  
    margin: 20px;  
}  
.sign-up {  
    text-align: center;  
    padding: 20px 0 0;  
}  
.alert {  
    margin-bottom: -30px;  
    font-size: 13px;  
    margin-top: 20px;  
}  
</style>  
<body>  
  <div class="global-container">  
    <div class="card login-form">  
    <div class="card-body">  
        <h3 class="card-title text-center"> Login </h3>  
        <div class="card-text">  
            <form action="<?php echo base_url()."index.php/Login/index";?>" method="POST">  
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Username </label>  
                    <input type="username" class="form-control form-control-sm" id="username" name="username">  
                </div>  
                <div class="form-group">  
                    <label for="exampleInputPassword1"> Password </label>  
                    <a href="#" style="float:right;font-size:12px;"> Forgot password? </a>  
                    <input type="password" class="form-control form-control-sm" id="password" name="password">  
                </div>  
                <div class="form-group">  
                    <label for="exampleInputPassword1"> Apakah belum punya akun? </label>  
                    <a href="<?php echo base_url()."index.php/Welcome/register";?>" style="float:right;font-size:12px;"> Register di sini </a>   
                </div>  
                <button type="submit" class="btn btn-primary btn-block"> Log in </button>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  