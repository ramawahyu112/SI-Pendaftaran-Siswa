<?php

// Menghapus data pendaftaran sesuai id_pendaftaran yang dipilih
include '../koneksi.php';

if (isset($_GET['id_pendaftaran']) && isset($_GET['fungsi'])){
            $id_pendaftaran=$_GET['id_pendaftaran'];
            $sql_hapus="DELETE FROM pendaftaran WHERE id_pendaftaran=".$id_pendaftaran;
            $hapus=mysqli_query($koneksi,$sql_hapus);

            if($hapus){
                if ($_GET['fungsi']=='deletedatapendaftar'){
                    header('location: admin.php?info=Data Berhasil Dihapus');
                }
            }
        }

?>