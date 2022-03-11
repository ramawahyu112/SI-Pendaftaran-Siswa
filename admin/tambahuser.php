<?php

include '../koneksi.php';

// Cek apakah tombol simpan ditekan
if (isset($_POST['btn_simpan'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $nama = $_POST['nama'];
                $akses = $_POST['akses'];

                if (!empty($username) && !empty($password) && !empty($nama) ) {
                    $sql = "INSERT into user (username, password, nama, akses)  values ('$username','$password','$nama',$akses)";
                    $tambah = mysqli_query($koneksi,$sql);
                    if($tambah && isset($_GET['fungsi'])){
                        if ($_GET['fungsi']=="tambahuser"){
                            header("location:admin.php?info=Data User Berhasil Ditambahkan");
                        }
                    }
                }else{
                    $pesan= "Tidak dapat menyimpan, data belum lengkap!";
                    echo' <script>alert('.$pesan.')</script>';
                }
            }
          
        ?>
        
        <div class="container" style="margin-top: 20px;">
        <h2>Tambah Data User</h2>
        <form action="admin.php?fungsi=tambahuser" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control"  size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control"  size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                       <select name="akses" >
                           <option value="1">User</option>
                           <option value="0">Admin</option>
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">                      
                        <input type="submit" name="btn_simpan" class="btn btn-primary"  value="Simpan"> 
                        <a href="admin.php?fungsi=datauser" class="btn btn-success" role="button"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
        </form>
    
        </div>