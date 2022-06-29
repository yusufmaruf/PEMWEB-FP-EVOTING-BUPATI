<?php
// memanggil koneksi 
include('koneksi.php');
// deklarasi namespace dom pdf 
require_once("dompdf/autoload.inc.php");
// deklarasi namespace dom pdf 
use Dompdf\Dompdf;
// membuat object dom pdf 
$dompdf = new Dompdf();
// query penggambilan data 
$query = mysqli_query($koneksi, "SELECT * from tb_paslon");
// pembuatan tabel 
$html = '<hr><center><h3>DATA PASLON</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No Urut</th>
<th>Nama Paslon</th>
<th>Nama wakil</th>
<th>Visi</th>
<th>misi</th>
</tr>';
// pemberian nomor 
$no = 1;
// memunculkan data 
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
// konversi html ke pdf 
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Rekap paslon.pdf');
