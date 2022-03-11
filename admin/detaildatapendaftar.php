<?php

include '../koneksi.php';

// Cek apakah untuk menyimpan data atau menampilkan data
if (isset($_POST['btn_simpan'])){
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $nama_ortu = $_POST['nama_ortu'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];

    if (!empty($nama_lengkap) && !empty($alamat) && !empty($jenis_kelamin) && !empty($agama) && !empty($tempat_lahir)&& 
    !empty($tgl_lahir)&& !empty($nama_ortu)&& !empty($no_hp)) {
        $sql = "UPDATE pendaftaran SET nama_lengkap='$nama_lengkap',alamat='$alamat',jenis_kelamin='$jenis_kelamin',
        agama='$agama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',nama_ortu='$nama_ortu',no_hp='$no_hp',status=$status where id_pendaftaran=".$id_pendaftaran;
        $update = mysqli_query($koneksi,$sql);
        if($update && isset($_GET['fungsi'])){
            if ($_GET['fungsi']=="detaildatapendaftar"){
                header("location:admin.php?info=Data Berhasi dirubah");
            }
        }
    }else{
        $pesan= "Tidak dapat menyimpan, data belum lengkap!";
    }
}else{
    // Menampilkan data sesuai id_pendaftaran
    $id_pendaftaran = $_GET['id_pendaftaran'];
    $sql_peserta= "SELECT * FROM pendaftaran WHERE id_pendaftaran=".$id_pendaftaran;
    $query_peserta= mysqli_query($koneksi,$sql_peserta);
    $data_peserta= mysqli_fetch_assoc($query_peserta);


?>

<div class="container" style="margin-top: 20px;">
    <h2>Detail Data Siswa</h2>
    <form action="admin.php?fungsi=detaildatapendaftar" method="POST">
    <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text"  name="nama_lengkap" class="form-control" value="<?php echo $data_peserta['nama_lengkap'];?>" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                   <div class="form-check">
                       <input type="radio"  class="form-check-input" name="jenis_kelamin" <?php if($data_peserta['jenis_kelamin']=='L'){ echo 'checked'; } ?>  value="L" required>
                       <label class="form-check-label">Laki-laki</label>
                   </div>
                   <div class="form-check">
                       <input type="radio"  class="form-check-input" name="jenis_kelamin"  value="P"  <?php if($data_peserta['jenis_kelamin']=='P'){ echo 'checked'; } ?> required>
                       <label class="form-check-label">Perempuan</label>
                   </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat, tanggal lahir </label>
                <div class="col-sm-4">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" size="4" placeholder="tempat lahir" value="<?php echo $data_peserta['tempat_lahir'];?>" required >
                </div>
                <div class="col-sm-3">
                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" size="4" placeholder="tanggal lahir" value="<?php echo $data_peserta['tgl_lahir'];?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                   <select id="agama" name="agama" >
                       <option value="">Pilih salah satu</option>
                       <option value="Islam"  <?php if($data_peserta['agama']=='Islam'){ echo 'selected'; } ?>>Islam</option>
                       <option value="Kristen Protestan" <?php if($data_peserta['agama']=='Kristen Protestan'){ echo 'selected'; } ?>>Kristen Protestan</option>
                       <option value="Katolik" <?php if($data_peserta['agama']=='Katolik'){ echo 'selected'; } ?>>Katolik</option>
                       <option value="Hindu" <?php if($data_peserta['agama']=='Hindu'){ echo 'selected'; } ?>>Hindu</option>
                       <option value="Budha" <?php if($data_peserta['agama']=='Budha'){ echo 'selected'; } ?>>Budha</option>
                       <option value="Kepercayaan lainnya" <?php if($data_peserta['agama']=='Kepercayaan lainnya'){ echo 'selected'; } ?>>Kepercayaan lainnya</option>
                   </select>
                </div>
            </div>           
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                   <textarea name="alamat" id="alamat" class="form-control" required><?php echo $data_peserta['alamat'];?></textarea>
                </div>
            </div>
                     
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Orang Tua</label>
                <div class="col-sm-10">
                    <input type="text" id="nama_ortu" name="nama_ortu" class="form-control" value="<?php echo $data_peserta['nama_ortu'];?>"   required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                    <input type="number" id="no_hp" name="no_hp" class="form-control" value="<?php echo $data_peserta['no_hp'];?>"  required>
                </div>
            </div>   
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                   <select name="status" id="status" > 
                       <option value="0"  <?php if($data_peserta['status']=='0'){ echo 'selected'; } ?>>Belum Disetujui</option>                      
                       <option value="1"  <?php if($data_peserta['status']=='1'){ echo 'selected'; } ?>>Diterima</option>
                       <option value="2" <?php if($data_peserta['status']=='2'){ echo 'selected'; } ?>>Cadangan</option>
                       <option value="3"  <?php if($data_peserta['status']=='3'){ echo 'selected'; } ?>>Tidak Diterima</option>   
                    </select>
                </div>
            </div>         
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="hidden"  name="id_pendaftaran" value="<?php echo $id_pendaftaran;?>">
                    <a href="admin.php?fungsi=datapendaftar" class="btn btn-success" role="button"> <i class="fa fa-backward"></i> Kembali</a>
                    <input type="submit"  name="btn_simpan" class="btn btn-primary "  value="Simpan"> 
                </div>
            </div>
    </form>

    </div>

<?php 

    }

 ?>