<?php 
    if (isset($_SESSION['hasil'])) {
        if ($_SESSION['hasil']) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5>Berhasil</h5>`
        <?php echo $_SESSION['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>`
    </div>
<?php 
    } else {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5>Gagal</h5>`
        <?php echo $_SESSION['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>`
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
    </div>

    <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, consectetur.</li>
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User</h6>
                        </div>
                        <div class="card-body">
                            <a href="?page=user-add" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                Tambah Data
                            </a>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $database = new Database();
                                        $db = $database->getConnection();
                                        
                                        $selectSQL = "SELECT * FROM tb_user";
                                        $stmt = $db->prepare($selectSQL);
                                        $stmt->execute();
                                        $row_data = $stmt->rowCount();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['level'] ?></td>
                                            <td>
                                                <a href="?page=user-update&id=<?php echo $row['id'] ?>" class="fas fa-edit"></a>
                                                <a href="?page=user-delete&id=<?php echo $row['id'] ?>" class="fas fa-trash" style="color: red;"></a>
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
