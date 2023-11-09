<?php 
if (isset($_GET['id'])) {

    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = "SELECT * FROM tb_mahasiswa WHERE id = :id";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if(isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();

            $validateSql = "SELECT * FROM tb_mahasiswa WHERE nim = :nim AND id != :id";
            $stmt = $db->prepare($validateSql);
            $stmt->bindParam('nim', $_POST['nim']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
?>
                <div class="alert alert-danger alert-dimissible">
                    <button type="button" class="close" data-disimissible="alert" aria-hidden="true"></button>
                    <h5><i class="icon fa fa-ban"></i> Gagal</h5>
                    Data mahasiswa sudah ada
                </div>
        <?php 
            } else {
                $updateSql = "UPDATE tb_mahasiswa SET nim = :nim, nama = :nama, jurusan = :jurusan, jenis_kelamin = :jenis_kelamin, alamat = :alamat, telepon = :telepon, email = :email WHERE id = :id";
                $stmt = $db->prepare($updateSql);
                $stmt->bindParam(':nim', $_POST['nim']);
                $stmt->bindParam(':nama', $_POST['nama']);
                $stmt->bindParam(':jurusan', $_POST['jurusan']);
                $stmt->bindParam(':jenis_kelamin', $_POST['jenis_kelamin']);
                $stmt->bindParam(':alamat', $_POST['alamat']);
                $stmt->bindParam(':telepon', $_POST['telepon']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':id', $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=mahasiswa-read'>";
            }
        }
?>
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Mahasiswa</h1>
    </div>

    <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mahasiswa</h6>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="nim" class="py-2">NIM</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="nama" class="py-2">Nama</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="jurusan" class="py-2">Jurusan</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="jurusan" class="form-control" id="select2-jurusan">
                                            <option value="">- Pilih -</option>
                                            <option value="TI" <?= ($row['jurusan'] == 'TI') ? 'selected' : ''; ?>>Teknik Informatika</option>
                                            <option value="SI" <?= ($row['jurusan'] == 'SI') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="jenis_kelamin" class="py-2">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="jenis_kelamin" class="form-control" id="select2-jenis_kelamin">
                                            <option value="">- Pilih -</option>
                                            <option value="L" <?= ($row['jenis_kelamin'] =='L' ? 'selected' : '' ) ?> >Laki-laki</option>
                                            <option value="P" <?= ($row['jenis_kelamin'] =='P' ? 'selected' : '' ) ?> >Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="alamat" class="py-2">Alamat</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="telepon" class="py-2">Telepon</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="telepon" class="form-control" value="<?= $row['telepon'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <label for="email" class="py-2">Email</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="email" class="form-control" value="<?= $row['email'] ?>">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary" name="button_update">
                                                    <i class="fas fa-save"></i>
                                                    Simpan
                                                </button>
                                                <a href="?page=mahasiswa-read" class="btn btn-danger">
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
        <?php
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=mahasiswa-read'>";
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=mahasiswa-read'>";
}
?>