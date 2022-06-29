<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Pemilih</h3>
	</div>
    <!-- form input  -->
	<form action="" method="post" >
		<div class="card-body">

      <!-- nik -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik...">
        </div>
      </div>


      <!-- nama pemilih  -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Pemilih</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan Nama Pemilih..." required>
        </div>
      </div>
        <!-- password  -->
       <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="password" name="password" placeholder="Password..." required>
        </div>
      </div>
		</div>
		<div class="card-footer">
            <!-- tombol simpan  -->
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <!-- tombol batal  -->
			<a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
    // cek apakah form terisi 
    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_user (password,namauser,nik,level,status,jenis) VALUES (
        '".$_POST['password']."',
        '".$_POST['nama_pengguna']."',
        '".$_POST['nik']."',
        'pemilih',
        '1',
        'PML')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
        // menampilkan pesan sukses tersimpan 
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pemilih';
          }
      })</script>";
      }else{
    // menampilkan pesan gagal simpan 
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pemilih';
          }
      })</script>";
    }}
     //selesai proses simpan data
