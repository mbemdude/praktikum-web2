<?php 
    if (isset($_SESSION['hasil'])) {
        if ($_SESSION['hasil']) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5>Berhasil</h5>
        <?php echo $_SESSION['pesan']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
<?php 
    } else {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5>Gagal</h5>
        <?php echo $_SESSION['pesan'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
<?php 
    }
        unset($_SESSION['hasil']);
        unset($_SESSION['pesan']);
    }
?>
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User</h6>
                    </div>
                    <div class="card-body">
                        <a href="mahasiswaAdd.html" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </a>
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-print"></i>
                            Cetak FPDF
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fas fa-print"></i>
                            Cetak windows.print
                        </a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $database = new Database();
                                        $db = $database->getConnection();

                                        $selectSQL = "SELECT * FROM tb_mahasiswa";
                                        $stmt = $db->prepare($selectSQL);
                                        $stmt->execute();
                                        $row_data = $stmt->rowCount();

                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <td><?php echo $row['nim'] ?></td>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo $row['jurusan'] ?></td>
                                        <td><?php echo $row['jenis_kelamin'] ?></td>
                                        <td><?php echo $row['alamat'] ?></td>
                                        <td><?php echo $row['telepon'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td>
                                            <a href="#" class="fas fa-edit"></a>
                                            <a href="#" class="fas fa-trash" style="color: red;"></a>
                                            <a href="#" class="fas fa-print" style="color: #20e9ac;"></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>