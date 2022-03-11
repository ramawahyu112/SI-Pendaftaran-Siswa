<?php

include '../koneksi.php';

// Cek apakah untuk menyimpan data atau menampilkan data
if (isset($_POST['btn_simpan'])){
                $id_user = $_POST['id_user'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $nama = $_POST['nama'];
                $akses = $_POST['akses'];

                if (!empty($username) && !empty($password) && !empty($nama) ) {
                    $sql = "UPDATE user SET username='$username',password='$password',nama='$nama',
                    akses=$akses where id_user=".$id_user;
                    $update = mysqli_query($koneksi,$sql);
                    if($update && isset($_GET['fungsi'])){
                        if ($_GET['fungsi']=="updateuser"){
                            header("location:admin.php?info=Data User Berhasil Diubah");
                        }
                    }
                }else{
                    $pesan= "Tidak dapat menyimpan, data belum lengkap!";
                    echo' <script>alert('.$pesan.')</script>';
                }
            }else{
                $id_user = $_GET['id_user'];
                $sql_peserta= "SELECT * FROM user WHERE id_user=".$id_user;
                $query_peserta= mysqli_query($koneksi,$sql_peserta);
                $data_peserta= mysqli_fetch_assoc($query_peserta);
       
    
        ?>
        
        <div class="container" style="margin-top: 20px;">
        <h2>Update Data User</h2>
        <form action="admin.php?fungsi=updateuser" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" value="<?php echo $data_peserta['nama'];?>" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" value="<?php echo $data_peserta['username'];?>" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" value="<?php echo $data_peserta['password'];?>" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                       <select name="akses" >
                           <option value="1"  <?php if($data_peserta['akses']==1){ echo 'selected'; } ?>>User</option>
                           <option value="0" <?php if($data_peserta['akses']==0){ echo 'selected'; } ?>>Admin</option>
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                        <input type="submit" name="btn_simpan" class="btn btn-primary"  value="Simpan"> 
                        <a href="admin.php?fungsi=datauser" class="btn btn-success" role="button"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
        </form>
    
        </div>

        <?php
             }
             ?>