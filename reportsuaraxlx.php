<?php
include('koneksi.php'); // Menyambungkan dengan koneksi
require 'vendor/autoload.php'; // Memanggil file autoload.php di dalam folder vendor
// Menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
header('Content-Disposition: attachment; filename="reportSUara.xlsx"');
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menuliskan nama kolom
$sheet->setCellValue('A1', 'Data Suara');
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Paslon');
$sheet->setCellValue('C2', 'Nama Pemilih');
$sheet->setCellValue('D2', 'Tanggal Voting');


// Mengambil data pada tabel tb_siswa dengan memanggil koneksi
$query = mysqli_query($koneksi, "SELECT p.id_paslon AS id, u.namauser AS nama, v.date FROM tb_vote v JOIN tb_user u ON v.iduser = u.iduser JOIN tb_paslon p ON v.id_paslon = p.id_paslon"); 
$i = 3;
$no = 1;
while ($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no);
	$sheet->setCellValue('B'.$i, $row['id']);
	$sheet->setCellValue('C'.$i, $row['nama']);
	$sheet->setCellValue('D'.$i, $row['date']);
    $no++;
	$i++;
}

// membuat border 
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \phpoffice\phpspreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet); // Render menjadi file Xlsx hasil dari object $spreadsheet 
$writer->save('php://output'); // Menyimpan file excel dengan nama Report Data Siswa.xlsx
?>