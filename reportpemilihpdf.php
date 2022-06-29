<?php
// memanggil koneksi 
include('koneksi.php');
// memanggil file autoload 
require_once("dompdf/autoload.inc.php");
// deklarasi namespace dom pdf 
use Dompdf\Dompdf;
// membuat object dom pdf 
$dompdf = new Dompdf();
// query penggambilan data 
$query = mysqli_query($koneksi, "select * FROM tb_user WHERE jenis = 'PML'");
// pembuatan tabel 
$html = '<hr><center><h3>Daftar Pemilih Tetap</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No.</th>
<th>NIK</th>
<th>Nama Pemilih</th>
</tr>';
// pemberian nomor 
$no = 1;
// memunculkan data 
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['nik'] . "</td>
    <td>" . $row['namauser'] . "</td>
    </tr>";
    $no++;
}
$html .= "</html>";
// konversi html ke pdf 
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Daftar Pemilih Tetap.pdf');
