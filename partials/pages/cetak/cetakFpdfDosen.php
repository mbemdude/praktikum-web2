<?php 
require '../../../vendor/fpdf/fpdf.php';
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN DATA DOSEN', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 8, 'No.', 1, 0, 'C');
$pdf->Cell(20, 8, 'NIDN', 1, 0, 'C');
$pdf->Cell(50, 8, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(18, 8, 'JK', 1, 0, 'C');
$pdf->Cell(10, 8, 'Alamat', 1, 0, 'C');
$pdf->Cell(60, 8, 'Telepon', 1, 0, 'C');
$pdf->Cell(25, 8, 'Email', 1, 0, 'C');
$pdf->SetFont('Arial', '', 10);

include '../../../database/conn.php';
$database = new Database();
$db = $database->getConnection();

$selectSQL = "SELECT * FROM tb_mahasiswa";
$stmt = $db->prepare($selectSQL);
$stmt->execute();

$no = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(10, 8, $no, 1, 0, 'C');
    $pdf->Cell(20, 8, $row['nim'], 1, 0, 'C');
    $pdf->Cell(50, 8, $row['nama'], 1, 0);
    $pdf->Cell(10, 8, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(60, 8, $row['alamat'], 1, 0);
    $pdf->Cell(25, 8, $row['telepon'], 1, 0);
    $pdf->Cell(50, 8, $row['email'], 1, 1);
    $no++;
}

$pdf->Output();
?>
