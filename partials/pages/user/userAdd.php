<?php 
if (isset($_POST['button_create'])) {

    $database = new Database();
    $db = $database->getConnection();

    $validationSql = "SELECT * FROM tb_user WHERE username = :username";
    $stmtValidation = $db->prepare($validationSql);
    $stmtValidation->bindParam(':username', $_POST['username']);
    $stmtValidation->execute();

    if ($stmtValidation->rowCount() > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5>Gagal</h5>
            Username sudah ada
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    } else {
        $insertSql = "INSERT INTO tb_user (username, level, password) VALUES (:username, :level, :password)";
        $hashedPassword = md5($_POST['password']);
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':level', $_POST['level']);
        $stmt->bindParam(':password', $hashedPassword);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=user-read'>";
    }
}
?>
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Data User</h1>
    </div>

    <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="username" class="py-2">Username</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="level" class="py-2">Level</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="level" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="operator">Operator</option>
                                            <option value="administrator">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="password" class="py-2">Password</label>
                                    </div>
                                <div class="col-lg-10">
                                    <input type="password" name="password" class="form-control">
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
                                            <a href="?page=user-read" class="btn btn-danger">
                                                <i class="fas fa-angle-left"></i>
                                                Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>