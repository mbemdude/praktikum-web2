<?php 
    if (isset($_SESSION['hasil'])) {
        if ($_SESSION['hasil']) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5>Berhasil</h5>
        <?php echo $_SESSION['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php 
    } else {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5>Gagal</h5>
        <?php echo $_SESSION['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php 
    }
        unset($_SESSION['hasil']);
        unset($_SESSION['pesan']);
    }
?>

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
    </div>

    <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dosen</h6>
                        </div>
                        <div class="card-body">
                            <a href="?page=dosen-add" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                Tambah Data
                            </a>
                            <a href="partials/pages/cetak/cetakFpdfDosen.php" class="btn btn-primary">
                                <i class="fas fa-print"></i>
                                Cetak PDF
                            </a>
                            <a href="partials/pages/cetak/cetakDosen.php" class="btn btn-warning">
                                <i class="fas fa-print"></i>
                                Cetak window.print
                            </a>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $database = new Database();
                                        $db = $database->getConnection();
                                        
                                        $selectSQL = "SELECT * FROM tb_dosen";
                                        $stmt = $db->prepare($selectSQL);
                                        $stmt->execute();
                                        $row_data = $stmt->rowCount();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['nidn'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['jenis_kelamin'] ?></td>
                                            <td><?php echo $row['alamat'] ?></td>
                                            <td><?php echo $row['telepon'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td>
                                                <a href="?page=dosen-update&id=<?php echo $row['id'] ?>" class="fas fa-edit"></a>
                                                <a href="?page=dosen-delete&id=<?php echo $row['id'] ?>" class="fas fa-trash" style="color: red;"></a>
                                                <a href="partials/pages/cetak/cetakDetailDosen.php?id=<?php echo $row['id'] ?>" class="fas fa-print" style="color: #1cc88a;"></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
