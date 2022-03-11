<?php

// File koneksi memuat host, username, password, nama database
$koneksi= mysqli_connect('localhost','root','','db_pmb');

// Cek jika gagal terhubung
if (mysqli_connect_errno()){
    echo "Gagal melakukan koneksi ke MYSQL: ".mysqli_connect_error();
}

?>