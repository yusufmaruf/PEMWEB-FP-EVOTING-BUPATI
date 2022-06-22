<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Paslon</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>Nama Paslon </th>
						<th>Nama Wakil Paslon</th>
						<th>Foto Paslon</th>
						<th>Visi</th>
						<th>Misi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_paslon");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_paslon']; ?>
						</td>
						<td>
							<?php echo $data['nama_paslon']; ?>
						</td>
						<td>
							<?php echo $data['nama_wakil']; ?>
						</td>
						<td align="center">
							<img src="foto/<?php echo $data['foto_paslon']; ?>" width="150px" />
						</td>
						<td>
							<?php echo $data['visi_paslon']; ?>
						</td>
						<td>
							<?php echo $data['misi_paslon']; ?>
						</td>
						
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
            <br>
            <button onclick="location.href='rekappaslonpdf.php';" id="reportpdf" type="button" class="btn btn-danger">Cetak PDF</button>
	        <button onclick="location.href='reportpaslonxlx.php';" id="reportexcel" type="button" class="btn btn-success">Cetak Excel</button>
		</div>
	</div>
	<!-- /.card-body -->