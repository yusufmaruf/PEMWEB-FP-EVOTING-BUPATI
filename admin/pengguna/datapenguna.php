<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengguna</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<!-- tombol add pengguna  -->
				<a href="?page=add-pengguna" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<!-- membuat table  -->
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<!-- judul tabel  -->
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Pengguna</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			//   pengambilan data di database 
              $sql = $koneksi->query("select * from tb_user where jenis='ADM'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<!-- menampilkan data  -->
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['namauser']; ?>
						</td>
						<td>
							<?php echo $data['level']; ?>
						</td>
						<td>
							<!-- tombol edit  -->
							<a href="?page=edit-pengguna&kode=<?php echo $data['iduser']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<!-- tombol delete  -->
							<a href="?page=del-pengguna&kode=<?php echo $data['iduser']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
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