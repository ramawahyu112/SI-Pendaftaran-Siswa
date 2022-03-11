
<?php

// Memulai sesi, cek login
session_start();
if (isset($_SESSION['login'])){

    // Cek apakah akses user siswa atau admin dan mengarahkan ke halaman masing-masing
    if ($_SESSION['akses'] == 1){
        header('location: siswa/siswa.php');
    } 
    else if ($_SESSION['akses'] == 0){
        header('location: admin/admin.php');
    }
    
    exit;
}
require 'koneksi.php';
$error=false;

if (isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    // Cek ketersediaan data inputan dengan username dan password pada database
    $query= mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
    $cek=mysqli_num_rows($query);

    if($cek > 0){
        $dataUser = mysqli_fetch_assoc($query);
        $statusAkses=$dataUser['akses'];
        $_SESSION['id_user']=$dataUser['id_user'];

        // Menyimpan sesi 
        if ($statusAkses == 1){           
            $_SESSION['login']=true;
            $_SESSION['nama']=$dataUser['nama'];
            $_SESSION['akses']=1;
            header("location: siswa/siswa.php");
        }
        else if ($statusAkses == 0){
            $_SESSION['login']=true;
            $_SESSION['akses']=0;
            $_SESSION['nama']=$dataUser['nama'];
            header("location: admin/admin.php");
        }

    }
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
        <p class="sign" align="center"> Pendaftaran Siswa Baru</p>
        <hr> 
        <?php
          if ($error==true)
             echo' 
             <div class="alert alert-warning"> Username atau Password Salah !'.$cek.' </div>';
            ?>       
       <form class="form1" method="post" action="login.php">
        <div class="container">
            <div class="justify-content-center ">
                <div class="form-group">
                  <input type="text" class="form-control" name="username"  placeholder="Username">
                </div>
                <div class="form-group ">
                    <input type="password" class="form-control" name="password"  placeholder="Password">
                  </div>
                  <input type="submit" name="login" value="Login" class="submit mt-3">
                  <p class="text-center mt-4">Belum memiliki akun ? Klik <a href="daftar.php">Daftar</a></p>
            </div>
        </div>
    </form>
   </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<script src="asset/js/bootstrap.min.js"></script>
</body>

</html>