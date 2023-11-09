<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $deleteSql = "DELETE FROM tb_dosen WHERE id = :id";
    $stmt = $db->prepare($deleteSql);
    $stmt->bindParam(':id', $_GET['id']);
    if($stmt->execute()) {
        $_SESSION['hasil'] = true;
        $_SESSION['pesan'] = "Data berhasil dihapus";
    } else {
        $_SESSION['hasil'] = false;
        $_SESSION['pesan'] = "Data gagal dihapus";
    }
}
echo "<meta http-equiv='refresh' content='0;url=?page=dosen-read'>";
?>