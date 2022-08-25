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
        <h3 class="card-title text-center"> Register Pelanggan </h3>  
        <div class="card-text">  
            <form action="<?php echo base_url()."index.php/Welcome/registrasi";?>" method="POST">  
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Username </label>  
                    <input type="text" class="form-control form-control-sm" name="username" required>  
                </div> 
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Password </label>  
                    <input type="password" class="form-control form-control-sm" name="password" required>  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Nama Lengkap </label>  
                    <input type="text" class="form-control form-control-sm" name="nama" required>  
                </div> 
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Alamat Lengkap </label>  
                    <input type="text" class="form-control form-control-sm" name="alamat" required>  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Nomor HP </label>  
                    <input type="text" class="form-control form-control-sm" name="nomor_hp" required>  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Email </label>  
                    <input type="text" class="form-control form-control-sm" name="email" required>  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Nama Perusahaan </label>  
                    <input type="text" class="form-control form-control-sm" name="nama_perusahaan">  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Alamat Perusahaan </label>  
                    <input type="text" class="form-control form-control-sm" name="alamat_perusahaan">  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Jabatan </label>  
                    <input type="text" class="form-control form-control-sm" name="jabatan">  
                </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> ID Pelanggan </label>  
                    <input type="text" class="form-control" id="" placeholder="" name="id_pelanggan" readonly="" value="<?php
                    $this->db->order_by('id','desc');
                    $kode = $this->db->get('login')->row()->id_pelanggan;
                    $kode_baru = "PLG".(substr($kode, 3, strlen($kode)-3) + 1);
                    echo $kode_baru;
                    ?>">                
                    </div>
                <div class="form-group">  
                    <label for="exampleInputEmail1"> Register Sebagai </label>  
                    <input type="text" class="form-control form-control-sm" name="level" value="pelanggan" readonly>  
                </div>
                <div class="form-group">  
                    <label for="exampleInputPassword1"> Sudah Punya Akun? </label>  
                    <a href="<?php echo base_url()."index.php/Welcome/beranda_login";?>" style="float:right;font-size:12px;"> Login di sini </a>   
                </div> 
                <button type="submit" class="btn btn-primary btn-block"> Daftar </button>  
            </form>  
        </div>  
    </div>  
</div>  
</div>  
</body>  
</html>  