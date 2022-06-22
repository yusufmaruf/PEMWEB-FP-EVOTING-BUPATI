<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-pemilih" class="btn btn-info">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
            <!-- table  -->
			<table id="example1" class="table table-bordered table-striped">
                <!-- header table  -->
				<thead>
					<tr>
						<th>No.</th>
						<th>NPM</th>
						<th>Nama Pemilih</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
            //   mengambil datda dari db untuk user pemilih 
              $sql = $koneksi->query("select * from tb_user where jenis='PML'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
                        <!-- menampilkan nomor  -->
						<td>
							<?php echo $no++; ?>
						</td>
                        <!-- menampilkan nik -->
						<td>
							<?php echo $data['nik']; ?>
						</td>
                        <!-- show name  -->
						<td>
							<?php echo $data['namauser']; ?>
						</td>
                        <!-- show status  -->
						<td>
							<?php $stt = $data['status']  ?>
                            <!-- pilihan status  -->
							<?php if($stt == '1'){ ?>
							<span class="badge badge-warning">Belum memilih</span>
							<?php }elseif($stt == '0'){ ?>
							<span class="badge badge-primary">Sudah memilih</span>
						</td>
						<?php } ?>
						</td>
						<td>
                            <!-- change button -->
							<a href="?page=edit-pemilih&kode=<?php echo $data['iduser']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
                            <!-- del button  -->
							<a href="?page=del-pemilih&kode=<?php echo $data['iduser']; ?>" onclick="return confirm('Hapus Data Ini ?')"
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