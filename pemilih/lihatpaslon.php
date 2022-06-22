<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_paslon WHERE id_paslon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$kode=$_GET['kode'];
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Paslon</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=dpt-datakandidat" class="btn btn-secondary btn-sm">
					< Kembali</a>
			</div>
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>Nama Ketua</th>
						<th>Nama Wakil</th>
						<th>Foto paslon</th>
						<th>Visi</th>
						<th>Misi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_paslon where id_paslon=$kode");
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
		</div>
	</div>
	<!-- /.card-body -->