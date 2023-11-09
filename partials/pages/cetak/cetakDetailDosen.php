<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak | Data Dosen</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 align="center">Laporan Detail Data Dosen</h2>
    <table align="center">
        <tbody>
            <?php 
                require '../../../database/conn.php';

                $database = new Database();
                $db = $database->getConnection();

                $id = $_GET['id'];
                $selectSQL = "SELECT * FROM tb_dosen WHERE id = :id";
                $stmt = $db->prepare($selectSQL);
                $stmt->bindParam(':id', $_GET['id']);
                $stmt->execute();

                $no = 1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <tr>
                    <td>No</td>
                    <td><?php echo $no++ ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><?php echo $row['nidn'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $row['nama'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $row['alamat'] ?></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><?php echo $row['telepon'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>