<?php

// Menghapus data user sesuai id_user yang dipilih
include '../koneksi.php';
if (isset($_GET['id_user']) && isset($_GET['fungsi'])){
            $id_user=$_GET['id_user'];
            $sql_hapus="DELETE FROM user WHERE id_user=".$id_user;
            $hapus=mysqli_query($koneksi,$sql_hapus);

            if($hapus){
                if ($_GET['fungsi']=='deleteuser'){
                    header('location: admin.php?info=Data User Berhasil Dihapus');
                }
            }
        }
?>