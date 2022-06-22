<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Calon Bupati</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_paslon" name="nama_paslon" placeholder="Masukkan Nama Calon Bupati...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_wakil" name="nama_wakil" placeholder="Masukkan Nama Wakil...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_paslon" name="foto_paslon">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi_paslon" name="visi_paslon" placeholder="Masukkan Visi...">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi_paslon" name="misi_paslon" placeholder="Masukkan Misi...">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			
            <a href="?page=data-paslon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	$sumber = @$_FILES['foto_paslon']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto_paslon']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){
           

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_paslon (nama_paslon,  nama_wakil,  foto_paslon, visi_paslon, misi_paslon) VALUES (
        '".$_POST['nama_paslon']."',
        '".$_POST['nama_wakil']."',
        '".$nama_file."',
        '".$_POST['visi_paslon']."',
        '".$_POST['misi_paslon']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-paslon';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-paslon';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=data-paslon';
		}
	})</script>";
  }
}   
