<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
    <!-- form  -->
	<form action="" method="post" >
		<div class="card-body">
            <!-- nik  -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK...">
				</div>
			</div>

            <!-- nama  -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pengguna</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan Nama..." required>
				</div>
			</div>

            <!-- password  -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password...">
				</div>
			</div>

            <!-- level  -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-4">
					<select name="level" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Admin</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
            <!-- tombol batal  -->
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    // mengecek apakah form telah diisi 
    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_user (password,namauser,level,nik,status,jenis) VALUES (
        '".$_POST['password']."',
        '".$_POST['nama_pengguna']."',
        'admin',
        '".$_POST['nik']."',
        '1',
        'ADM')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
        // menampilkan alert succes jika sukses menyimpan 
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
      }else{
        // menampilkan alert erorr kika error 
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";
    }}
     //selesai proses simpan data
