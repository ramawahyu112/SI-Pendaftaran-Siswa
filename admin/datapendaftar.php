<?php

// Fungsi untuk memeriksa status pendaftar dan menampilkan dengan badge
function status($status){

    if ($status == 1)
    {
        $tampilStatus= '
        <div class="badge badge-success">
         Diterima
        </div>';

    }
    else if ($status == 2)
    {
        $tampilStatus= '
        <div class="badge badge-success">
         Cadangan
        </div>';

    } else if ($status == 3)
    {
        $tampilStatus= '
        <div class="badge badge-danger">
         Tidak Diterima
        </div>';

    } else {
        $tampilStatus= '
        <div class="badge badge-info">
         Diproses
        </div>';

    }

    return $tampilStatus;
    
}

?>
    <!-- Main content -->
    <div class="container" style="margin-top: 20px;">
        <h3 class="text-center">Data Siswa</h3>
        <hr>
        <div class="form-group">
        <a class="btn btn-success float-right mb-2" href="admin.php?fungsi=tambahpendaftar"><i class="fa fa-plus"></i> Tambah data</a>
        </div>
        <table class="table table-striped table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nama Orang Tua</th>
                <th>Status</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Menampilkan data pendaftaran dengan menghubungkan koneksi pada database
            include '../koneksi.php';
            $sql = "SELECT * FROM pendaftaran";
            $query=mysqli_query($koneksi, $sql);

            if(mysqli_num_rows($query) > 0){
                $no=1;
                while ($data = mysqli_fetch_assoc($query)){
            ?>
             <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['nama_ortu'] ?></td>
                    <td><?= status($data['status']) ?></td>
                    <td>
                    <a href="admin.php?fungsi=detaildatapendaftar&id_pendaftaran=<?= $data['id_pendaftaran'] ?>" class="badge badge-warning"> <i class="fa fa-edit"></i> Detail</a>
                    <a href="admin.php?fungsi=deletedatapendaftar&id_pendaftaran=<?= $data['id_pendaftaran'] ?>" class="badge badge-danger" 
                    onClick="return confirm('Yakin ingin menghapus data ini ?')">  <i class="fa fa-trash"> </i> Delete</a>
                    <a class="badge badge-info " href="../pdf.php?id_print=<?= $data['id_pendaftaran'] ?>"><i class="fa fa-print"></i> Print Pdf</a>
                    </td>
                </tr>

            <?php

                $no++;
                }
            }else{

            ?>
                <tr>
                <td colspan="6">Tidak ada data.</td>
                </tr>

            <?php }?>
        </tbody>

    </table>

</div>