<?php

// Array sederhana
$bahasa=['SD 6 Jimbaran', ' Beranda', 'Profil', 'Informasi', 'Kontak', 'Login', 'Daftar', 'Sejarah', 'Staf & Guru', 'More Option' ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?= $bahasa[0] ?></title>
</head>
<body>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs navbar-sd fixed-top" >
            <li class="navbar-brand ml-3">
               <a class="navbar-text-sd" href="#"> <?= $bahasa[0] ?> </a> </li>
            <li class="nav-item">
                <a href="#d" class="nav-link navbar-text-sd "> <i class="fa fa-home"></i> <?= $bahasa[1] ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link navbar-text-sd dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-product-hunt"></i> <?= $bahasa[2] ?> </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><?= $bahasa[7] ?></a>
                    <a class="dropdown-item" href="#"><?= $bahasa[8] ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"> <?= $bahasa[9] ?></a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link navbar-text-sd"><i class="fa fa-info"></i> <?= $bahasa[3] ?></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link navbar-text-sd"><i class="fa fa-phone"></i> <?= $bahasa[4] ?></a>
            </li>

            <li class="nav-item right-text">
                <a href="login.php" class="nav-link navbar-text-sd"><i class="fa fa-user"></i> <?= $bahasa[5] ?></a>
            </li>
            <li class="nav-item">
                <a href="daftar.php" class="nav-link navbar-text-sd"><i class="fa fa-book"></i> <?= $bahasa[6] ?></a>
            </li>
        </ul>
        

        <!-- Carousel  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="asset/img/gambar.jpg" height="800px" >
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="asset/img/gambar2.jpg" height="800px" >
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="asset/img/gambar3.jpg" height="800px" >
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

         <!-- Visi Misi Card -->
        <div class="container-fluid visimisi-sd">       
          <div class="card text-center ">
            <div class="card-body">
              <h4 class="card-title">VISI MISI</h4>
              <p class="card-text ">"Terwujudnya Siswa Beriman dan Taqwa, Berprestasi, Berbudaya dan Berwawasan Lingkungan. <br> Melaksanakan pembelajaran yang inovatif,   
                efektif dan partisipatif. "</p>
              <a href="login.php" class="btn btn-primary">Lihat Profile Lengkap</a>
            </div>
          </div>
        </div>

<!-- Footer -->
<footer>
    <div class="footer-sd">
        <div class="row">
        <div class="col-4 ml-3 mt-4">
            <i class="fa fa-map-marker ml-2"> Jln By Pass Ngurah Rai Jimbaran, Jimbaran</i>
            <i class="fa fa-phone mt-3 ml-2"> (+62) 3618472082.</i>
        </div>
        <div class="col-4 mt-5 mr-5 ">
            <h3>Sekolah Dasar Negeri 6 Jimbaran</h3> 
        </div>     
        <div class="col-3 mt-4 ">
         <ul class="ml-5 textnone"  >
             <li> <i class="fa fa-home"></i> Beranda</li> 
             <li><i class="fa fa-product-hunt"></i> Profil</li> 
             <li><i class="fa fa-info"></i> Informasi</li>  
             <li><i class="fa fa-phone"></i> Kontak</li>  
         </ul> 
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
<script src="asset/js/bootstrap.min.js"></script>

</html>