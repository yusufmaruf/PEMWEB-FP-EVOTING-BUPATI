<?php
$koneksi = new mysqli ("localhost","root","","evote");
?>
<div class="realtime">
	<div class="card card-info autoload">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-chart-pie"></i> Perolehan Suara</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Jumlah Suara</th>
						</tr>
					</thead>
					<tbody>

						<?php
		
					$sql = $koneksi->query("select * from tb_paslon");
					while ($data= $sql->fetch_assoc()) {
						// mengisi var penampung 
						$id_calon = $data["id_paslon"];
					?>

						<tr>
							<td>
								<!-- menampilkan nomor urut calon  -->
								<?php echo $data['id_paslon']; ?>
							</td>
							<td>
								<h4>
									<?php
									// query hitung suara 
								$sql_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_paslon='$id_calon'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
									// menampilkan suara 
								echo $row[0]." Suara";
								}
							?>
								</h4>
							</td>
						</tr>

						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>