<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * FROM tb_user WHERE jenis = 'PML'");

$html = '<hr><center><h3>Daftar Pemilih Tetap</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No.</th>
<th>NIK</th>
<th>Nama Pemilih</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['nik'] . "</td>
    <td>" . $row['namauser'] . "</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Daftar Pemilih Tetap.pdf');
