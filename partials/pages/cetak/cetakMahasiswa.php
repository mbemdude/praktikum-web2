<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak | Data Mahasiswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 align="center">Laporan Data Mahasiswa</h2>
    <table align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require '../../../database/conn.php';

                $database = new Database();
                $db = $database->getConnection();

                $selectSQL = "SELECT * FROM tb_mahasiswa";
                $stmt = $db->prepare($selectSQL);
                $stmt->execute();

                $no = 1;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nim'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['jurusan'] ?></td>
                <td><?php echo $row['jenis_kelamin'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['telepon'] ?></td>
                <td><?php echo $row['email'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>