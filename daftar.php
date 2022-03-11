
<?php

require 'koneksi.php';
$error=false;


if (isset($_POST['daftar'])){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    // Cek data tidak kosong query menambahkan data user ke database
    if (!empty($nama) && !empty($username) && !empty($password)) {
        $sql = "INSERT INTO user ( username, password, nama, akses )
        VALUES ('".$username."','".$password."','".$nama."',1)";
        $simpan = mysqli_query($koneksi,$sql);
        if($simpan){    
                header("location:login.php");
        }else{                   
            echo' <script>alert('. mysqli_error($koneksi) .')</script>';
        }
    }else{
        $pesan= "Tidak dapat menyimpan, data belum lengkap!";
        echo' <script>alert('.$pesan.')</script>';
    }

    $cek= mysqli_error($koneksi);
    $error=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>SD N 6 Jimbaran</title>
</head>
<body>
    <div class="main">
        <p class="sign" align="center"> Daftar Akun</p>
        <hr> 
        <?php
           if ($error==true)
             echo'
               <div class="alert alert-warning"> Data Belum Lengkap !'.$cek.' </div> ';
             ?>       
       <form class="form1" method="post" action="daftar.php">
        <div class="container">
            <div class="justify-content-center ">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama"  placeholder="Nama Lengkap">
                  </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="username"  placeholder="Masukkan username">
                </div>
                <div class="form-group ">
                    <input type="password" class="form-control" name="password"  placeholder=" Masukkan password">
                  </div>
                  <input type="submit" value="Daftar" name="daftar" class="submit ">
                  <p class="text-center mt-4">Sudah memiliki akun ? Klik <a href="login.php">Login</a></p>
            </div>

        </div>    
    
    </form>
   </div>
</body>
</html>