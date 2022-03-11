<?php

// Memulai sesi cek sudah login atau tidak
session_start();
if (!isset($_SESSION['login'])){
    header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/style.css?v=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>SD 6 Jimbaran</title>
</head>
<body >
        <!-- Nav tabs -->
        <ul class="nav nav-tabs navbar-sd " >
            <li class="navbar-brand ml-3">
               <a class="navbar-text-sd" href="siswa.php">SD 6 JImbaran </a> </li>
            <li class="nav-item">
                <a href="siswa.php?fungsi=daftarbaru" class="nav-link navbar-text-sd "> <i class="fa fa-id-card"></i> Daftar Baru</a>
            </li>
            <li class="nav-item">
              <a href="siswa.php?fungsi=lihatstatus" class="nav-link navbar-text-sd "> <i class="fa fa-info"></i> Status Pendaftaran</a>
          </li>

            <li class="nav-item right-text">
                <a href="#" class="nav-link navbar-text-sd"><i class="fa fa-user"></i> <?= $_SESSION['nama']; ?> </a>
            </li>
            <li class="nav-item">
                <a href="../logout.php" class="nav-link navbar-text-sd"><i class="fa fa-power-off"></i> Logout</a>
            </li>
        </ul>
        
    <div class="body-height">

    <?php

     // Logika percabangan menetukan tersedia atau tidaknya nilai parsing fungsi 
      if (isset($_GET['fungsi'])){ 
            getFungsi();
       } else {
              mainPage();
         }

         // Prosedur untuk menambahkan file berdasarkan nilai parsing fungsi pada url dengan method get
     function getFungsi(){
      
            switch ($_GET['fungsi']){
                case "daftarbaru":
                   include 'pendaftaran.php';
                break;
                case "lihatstatus":
                    include 'statuspendaftaran.php';
                break;
                default: 
                include 'siswa.php';                  

        } 

     }
     
    //  Prosedur yang dipanggil jika tidak ada nilai parsing fungsi pada url 
     function mainPage(){
         error_reporting(0);
         $info=$_GET['info'];

         if(!empty($info)){
            echo '
            <div class="container" style="margin-top: 20px; margin-bottom:200px">
            <h3>'.$info.'</h3> 
            <hr>
            <p>Silahkan cek <b> <a href="siswa.php?fungsi=lihatstatus">Status Pendaftaran</a> </b> untuk informasi pendaftaran</p>      
             </div>
            ';

         } else {
         echo '
         <div class="container" style="margin-top: 20px; margin-bottom:200px">
         <h3>Pendaftaran Siswa Baru</h3>
         <hr>
         <p>Silahkan pilih <b> <a href="siswa.php?fungsi=daftarbaru">Menu Daftar Baru</a> </b> untuk mendaftarkan diri</p>
          </div>
         ';
         }
     }

    
    ?>

</div>        

<!-- footer -->
<footer>
    <div class="footer-sd mt-5">
        <div class="row">
        <div class="col-4 ml-3 mt-4">
            <i class="fa fa-map-marker ml-2"> Jln By Pass Ngurah Rai Jimbaran, Jimbaran</i>
            <i class="fa fa-phone mt-3 ml-2"> (+62) 3618472082.</i>
        </div>
        <div class="col-4 mt-5 mr-5 ">
            <h3>Sekolah Dasar Negeri 6 Jimbaran</h3> 
        </div>       
    </div>
    <hr>
    <div class="text-center">
        Copyright @2021
    </div>

    </div>
    


</footer>



    
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<script src="../asset/js/bootstrap.min.js"></script>

</html>