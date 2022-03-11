<?php

// Fungsi untuk memeriksa akses dan merubah ke bentuk tulisan
function hakAkses($akses) {

    if ($akses == 1)
    {
        $hakakses="User";

    }
    else if ( $akses == 0)
    {
        $hakakses="Admin";
    }
    return $hakakses;

}

// Fungsi dan prosedur untuk menyatukan tulisan akses dengan fungsi hakAkses
function cetakAkses($akses) {

    echo "Akses ".hakAkses($akses);
}


?>
     <!-- Main content -->
    <div class="container" style="margin-top: 20px;">
        <h3 class="text-center">Data User</h3>
        <hr>
        <div class="form-group">
       <a class="btn btn-success float-right mb-2" href="admin.php?fungsi=tambahuser"><i class="fa fa-plus"></i> Tambah data</a>
        </div>
        <table class="table table-striped table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Akses</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            
        <?php
            // Menampilkan data user dengan menghubungkan koneksi pada database
            include '../koneksi.php';

            $sql = "SELECT * FROM user";
            $query=mysqli_query($koneksi, $sql);

            if(mysqli_num_rows($query) > 0){
                $no=1;
                while ($data = mysqli_fetch_assoc($query)){

                    // Cek hak akses 
                    $hakakses="";
                   


                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= cetakAkses($data['akses']) ?></td>
                    <td>
                    <a href="admin.php?fungsi=updateuser&id_user=<?= $data['id_user'] ?>" class="badge badge-warning"> <i class="fa fa-edit"> </i> Edit</a>
                    <a href="admin.php?fungsi=deleteuser&id_user=<?= $data['id_user'] ?>" class="badge badge-danger"
                    onClick="return confirm('Yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"> </i> Delete</a>
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
    <?php
            }
         ?>
        </tbody>

    </table>
    </div>