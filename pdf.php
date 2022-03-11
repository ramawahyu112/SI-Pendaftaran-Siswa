<?php

include 'koneksi.php';
require('vendor/autoload.php');

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id_print=$_GET['id_print'];

$sql = "SELECT * FROM pendaftaran where id_pendaftaran =".$id_print;
        $query=mysqli_query($koneksi, $sql);

$kodehmtl = '<html> <center><h3>Data Pendaftaran Siswa</h3></center><hr/><br/>';
$kodehmtl .= '<table border="1" width="100%">';

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
$kodehmtl .= "           
        <tr>
          <th  width='30%' align='left'> Nama Lengkap</th>
           <td>".$data['nama_lengkap']."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'> Jenis Kelamin</th>
           <td>".$kelamin."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Tempat Lahir</th>
           <td>". $data['tempat_lahir']."</td>
        </tr>
        <tr>
          <th width='30%' align='left'>Tanggal Lahir</th>
           <td>".$data['tgl_lahir'] ."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Agama</th>
           <td>". $data['agama']."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Alamat</th>
           <td>". $data['alamat'] ."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Nama Orang Tua</th>
           <td> ". $data['nama_ortu'] ."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Nomor HP</th>
           <td> ". $data['no_hp'] ."</td>
        </tr>
        <tr>
          <th  width='30%' align='left'>Status</th>
           <td>". $data['status'] ."</td>
        </tr>";
        }
    }
$kodehmtl .= "</table> </html>";


$dompdf->loadHtml($kodehmtl);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();

?>