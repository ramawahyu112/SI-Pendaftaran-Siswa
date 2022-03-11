<?php

include '../koneksi.php';

// Cek apakah tombol simpan ditekan 
if (isset($_POST['btn_simpan'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $nama_ortu = $_POST['nama_ortu'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];
    $id_user=$_SESSION['id_user'];
    

    if (!empty($nama_lengkap) && !empty($alamat) && !empty($jenis_kelamin) && !empty($agama) && !empty($tempat_lahir)&& 
    !empty($tgl_lahir)&& !empty($nama_ortu)&& !empty($no_hp)) {
        $sql = "INSERT into pendaftaran (id_user, nama_lengkap, alamat, jenis_kelamin, agama, tempat_lahir, tgl_lahir, nama_ortu, no_hp, tgl_pendaftaran, status) 
        values ($id_user, '$nama_lengkap','$alamat','$jenis_kelamin','$agama','$tempat_lahir','$tgl_lahir','$nama_ortu','$no_hp', '".date('Y-m-d')."', $status) ";
        $tambah = mysqli_query($koneksi,$sql);
        if($tambah && isset($_GET['fungsi'])){
            if ($_GET['fungsi']=="tambahpendaftar"){
                header("location:admin.php?info=Data Berhasi Ditambahkan");
            }
        }
    }else{
        $pesan= "Tidak dapat menyimpan, data belum lengkap!";
    }
}
?>

<div class="container" style="margin-top: 20px;">
    <h2>Tambah Data Siswa</h2>
    <form action="admin.php?fungsi=tambahpendaftar" method="POST">
    <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_lengkap" class="form-control" size="4" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                   <div class="form-check">
                       <input type="radio" class="form-check-input" name="jenis_kelamin"  value="L" required>
                       <label class="form-check-label">Laki-laki</label>
                   </div>
                   <div class="form-check">
                       <input type="radio" class="form-check-input" name="jenis_kelamin"  value="P" required>
                       <label class="form-check-label">Perempuan</label>
                   </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat, tanggal lahir </label>
                <div class="col-sm-4">
                    <input type="text" name="tempat_lahir" class="form-control" size="4" placeholder="tempat lahir"  required >
                </div>
                <div class="col-sm-3">
                    <input type="date" name="tgl_lahir" class="form-control" size="4" placeholder="tanggal lahir"  required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                   <select name="agama" >
                       <option value="">Pilih salah satu</option>
                       <option value="Islam" >Islam</option>
                       <option value="Kristen Protestan" >Kristen Protestan</option>
                       <option value="Katolik" >Katolik</option>
                       <option value="Hindu" >Hindu</option>
                       <option value="Budha" >Budha</option>
                       <option value="Kepercayaan lainnya" >Kepercayaan lainnya</option>
                   </select>
                </div>
            </div>           
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                   <textarea name="alamat" class="form-control" required></textarea>
                </div>
            </div>
                     
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Orang Tua</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_ortu" class="form-control"  required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                    <input type="number" name="no_hp" class="form-control"  required>
                </div>
            </div>   
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                   <select name="status" > 
                       <option value="0">Belum Disetujui</option>                      
                       <option value="1">Diterima</option>
                       <option value="2">Cadangan</option>
                       <option value="3">Tidak Diterima</option>   
                    </select>
                </div>
            </div>         
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="btn_simpan" class="btn btn-primary "  value="Simpan"> 
                    <a href="admin.php?fungsi=datapendaftar" class="btn btn-success" role="button"> <i class="fa fa-backward"></i> Kembali</a>
                </div>
            </div>
    </form>

    </div>