<?php
include('koneksi.php'); // Menyambungkan dengan koneksi
require 'vendor/autoload.php'; // Memanggil file autoload.php di dalam folder vendor
// Menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
header('Content-Disposition: attachment; filename="reportpaslon.xlsx"');
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menuliskan nama kolom
$sheet->setCellValue('A1', 'Data Paslon');
$sheet->setCellValue('A2', 'No urut ');
$sheet->setCellValue('B2', 'Nama paslon');
$sheet->setCellValue('C2', 'Nama Wakil ');
$sheet->setCellValue('D2', 'visi');
$sheet->setCellValue('E2', 'misi');


// Mengambil data pada tabel tb_siswa dengan memanggil koneksi
$query = mysqli_query($koneksi, "select * from tb_paslon"); 
$i = 3;
while ($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $row['id_paslon']);
	$sheet->setCellValue('B'.$i, $row['nama_paslon']);
	$sheet->setCellValue('C'.$i, $row['nama_wakil']);
	$sheet->setCellValue('D'.$i, $row['visi_paslon']);
	$sheet->setCellValue('E'.$i, $row['misi_paslon']);
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
$sheet->getStyle('A1:F'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet); // Render menjadi file Xlsx hasil dari object $spreadsheet 
$writer->save('php://output'); // Menyimpan file excel dengan nama Report Data Siswa.xlsx
?>