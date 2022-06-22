<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * from tb_paslon");

$html = '<hr><center><h3>Rekap Suara</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No Urut</th>
<th>Nama Paslon</th>
<th>Nama wakil</th>
<th>Visi</th>
<th>misi</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $row['id_paslon'] . "</td>
    <td>" . $row['nama_paslon'] . "</td>
    <td>" . $row['nama_wakil'] . "</td>
    <td>" . $row['visi_paslon'] . "</td>
    <td>" . $row['misi_paslon'] . "</td>
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
$dompdf->stream('Rekap Suara.pdf');
