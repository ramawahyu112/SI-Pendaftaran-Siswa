<?php

/* Fungsi cek status pendaftaran siswa dan 
 return variabel tampilStatus menampilkan dalam alert container */
 
function alertStatus ($siswa, $status){

    if ($siswa != "" || !empty($siswa))
    {

    if ($status == 1)
    {
        $tampilStatus= '
        <div class="alert alert-success container" role="alert">
            <h4 class="alert-heading">Selamat Pendaftar '.$siswa.' Dinyatakan Diterima </h4>
            <p>Pendaftar '.$siswa.' memenuhi kriteria yang sesuai dan diterima di sekolah ini, silahkan kumpulkan berkas langsung ke kantor</p>
            <hr>
            <p class="mb-0">Sekolah Dasar N 6 Jimbaran</p>
        </div>';
    }
    else if ($status == 2) 
    {
        $tampilStatus= '
        <div class="alert alert-success container" role="alert">
            <h4 class="alert-heading">Selamat Pendaftar '.$siswa.' Dinyatakan Diterima Sebagai Cadangan </h4>
            <p>Pendaftar '.$siswa.' memenuhi kriteria yang sesuai namun perlu seleksi kembali karena kuota yang terbatas di sekolah ini, mohon menunggu informasi lebih lanjut</p>
            <hr>
            <p class="mb-0">Sekolah Dasar N 6 Jimbaran</p>
        </div>';
    }
    else if ($status == 3) 
    {
        $tampilStatus= '
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Maaf '.$siswa.' Dinyatakan Tidak Diterima </h4>
            <p>Pendaftar '.$siswa.' tidak memenuhi kriteria yang sesuai atau kuota siswa telah penuh</p>
            <hr>
            <p class="mb-0">Sekolah Dasar N 6 Jimbaran</p>
        </div>';
    }
    else  
    {
        $tampilStatus= '
        <div class="alert alert-primary container" role="alert">
            <h4 class="alert-heading">Data '.$siswa.' Sedang di proses </h4>
            <p>Pendaftar '.$siswa.' silahkan mengecek secara berkala</p>
            <hr>
            <p class="mb-0">Sekolah Dasar N 6 Jimbaran</p>
        </div>';
    }
    
}
else 
{
        $tampilStatus= '
        <div class="container" role="alert">
            <h4 class="alert-heading"> Silahkan melakukan <a href="siswa.php?fungsi=daftarbaru">pendaftaran</a> terlebih dahulu !</h4>
        </div>';
    
}

return $tampilStatus;
   
}

// Menampilkan data pendaftaran yang memuat id_user yang login
include '../koneksi.php';
$sql = "SELECT * FROM pendaftaran p join user u on u.id_user=p.id_user where p.id_user=".$_SESSION['id_user'];
        $query=mysqli_query($koneksi, $sql);
        $datastatus = mysqli_fetch_assoc($query);
  ?>      

    <!-- Main content -->
     <div class="container" style="margin-top: 20px;">
        <h3>Status Pendaftaran</h3>
        <hr>

        <?= alertStatus($datastatus['nama_lengkap'], $datastatus['status']); ?>

        <div class="form-group">
        <a class="btn btn-danger " href="../pdf.php?id_print=<?= $datastatus['id_pendaftaran'] ?>"><i class="fa fa-print"></i> Print Pdf</a>
        </div>
        <table class="table  table-sm table-bordered">
        <tbody >

        <?php
        $query=mysqli_query($koneksi, $sql);

            if(mysqli_num_rows($query) > 0){
                while ($data = mysqli_fetch_assoc($query)){
                    $kelamin='';
                    
                    if ($data['jenis_kelamin'] == 'P'){
                        $kelamin="Perempuan";
                    }
                    else if ($data['jenis_kelamin'] == 'L'){
                        $kelamin="Laki-Laki";
                    }
                    else {
                        $kelamin="Data tidak ditemukan !!";
                    }
                    ?>
                <tr>
                  <th  width="30%"> Nama Lengkap</th>
                   <td><?= $data['nama_lengkap'] ?></td>
                </tr>
                <tr>
                  <th  width="30%"> Jenis Kelamin</th>
                   <td><?= $kelamin ?></td>
                </tr>
                <tr>
                  <th  width="30%">Tempat Lahir</th>
                   <td><?= $data['tempat_lahir'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Tanggal Lahir</th>
                   <td><?= $data['tgl_lahir'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Agama</th>
                   <td><?= $data['agama'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Alamat</th>
                   <td><?= $data['alamat'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Nama Orang Tua</th>
                   <td> <?= $data['nama_ortu'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Nomor HP</th>
                   <td> <?= $data['no_hp'] ?></td>
                </tr>
                <tr>
                  <th  width="30%">Status</th>
                   <td><?= $data['status'] ?></td>
                </tr>
        <?php
                }
            } else { ?>

                <tr>
                <td colspan="6">Tidak ada data.</td>
                </tr>
             
          <?php  } ?>
          
        </tbody>

    </table>
</div>