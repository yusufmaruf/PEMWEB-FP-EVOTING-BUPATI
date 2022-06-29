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
$query = mysqli_query($koneksi, "SELECT p.id_paslon, u.namauser, v.date FROM tb_vote v JOIN tb_user u ON v.iduser = u.iduser JOIN tb_paslon p ON v.id_paslon = p.id_paslon");
// pembuatan tabel 
$html = '<hr><center><h3>Rekap Suara</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No.</th>
<th>Paslon yang dipilih </th>
<th>Nama Pemilih</th>
<th>date</th>
</tr>';
// pemberian nomor 
$no = 1;
// memunculkan data 
while ($row = mysqli_fetch_array($query)) {
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['id_paslon'] . "</td>
    <td>" . $row['namauser'] . "</td>
    <td>" . $row['date'] . "</td>
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
$dompdf->stream('Rekap perolehan suara.pdf');
