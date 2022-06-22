<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i>Kotak Suara</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Paslon</th>
						<th>Nama  Pemilih</th>
						<th>Waktu Memilih</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_paslon, u.namauser, v.date FROM tb_vote v JOIN tb_user u ON v.iduser = u.iduser JOIN tb_paslon p ON v.id_paslon = p.id_paslon");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_paslon']; ?>
						</td>
						<td>
							<?php echo $data['namauser']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
            <br>
            <button onclick="location.href='reportsuarapdf.php';" id="reportpdf" type="button" class="btn btn-danger">Cetak PDF</button>
	        <button onclick="location.href='reportsuaraxlx.php';" id="reportexcel" type="button" class="btn btn-success">Cetak Excel</button>
		</div>
	</div>
	<!-- /.card-body -->