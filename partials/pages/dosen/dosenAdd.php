<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $validationSql = "SELECT * FROM tb_dosen WHERE nidn = :nidn";
    $stmtValidation = $db->prepare($validationSql);
    $stmtValidation->bindParam(':nidn', $_POST['nidn']);
    $stmtValidation->execute();

    if ($stmtValidation->rowCount() > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5>Gagal</h5>
            NIDN sudah ada
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    } else {
        $insertSql = "INSERT INTO tb_dosen (nidn, nama, jenis_kelamin, alamat, telepon, email) VALUES (:nidn, :nama, :jenis_kelamin, :alamat, :telepon, :email)";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(':nidn', $_POST['nidn']);
        $stmt->bindParam(':nama', $_POST['nama']);
        $stmt->bindParam(':jenis_kelamin', $_POST['jenis_kelamin']);
        $stmt->bindParam(':alamat', $_POST['alamat']);
        $stmt->bindParam(':telepon', $_POST['telepon']);
        $stmt->bindParam(':email', $_POST['email']);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=dosen-read'>";
    }
}
?>
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Data Dosen</h1>
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
                        <form method="post">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="nidn" class="py-2">NIDN</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="nidn" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="nama" class="py-2">Nama</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="jenis_kelamin" class="py-2">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="jenis_kelamin" class="form-control" id="select2-jenis_kelamin">
                                            <option value="">- Pilih -</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="alamat" class="py-2">Alamat</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="telepon" class="py-2">Telepon</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="telepon" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="email" class="py-2">Email</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary" name="button_create">
                                                    <i class="fas fa-save"></i>
                                                    Simpan
                                                </button>
                                                <a href="?page=dosen-read" class="btn btn-danger">
                                                    <i class="fas fa-angle-left"></i>
                                                    Kembali
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>