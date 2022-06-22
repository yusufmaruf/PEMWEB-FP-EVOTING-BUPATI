<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_paslon WHERE id_paslon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_paslon" name="id_paslon" value="<?php echo $data_cek['id_paslon']; ?>"
					 readonly/>
				</div>
			</div>

		

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ketua</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_paslon" name="nama_paslon" value="<?php echo $data_cek['nama_paslon']; ?>"
					/>
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wakil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_wakil" name="nama_wakil" value="<?php echo $data_cek['nama_wakil']; ?>"
					/>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_paslon" name="foto_paslon">
					<p class="help-block">
						<font color="red">*Format file .jpg</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi_paslon" name="visi_paslon" value="<?php echo $data_cek['visi_paslon']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi_paslon" name="misi_paslon" value="<?php echo $data_cek['misi_paslon']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-paslon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

$sumber = @$_FILES['foto_paslon']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_paslon']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto_paslon'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_paslon SET
          
            nama_paslon='".$_POST['nama_paslon']."',
            nama_wakil='".$_POST['nama_wakil']."',
            foto_paslon='".$nama_file."',
            visi_paslon='".$_POST['visi_paslon']."',
           	misi_paslon='".$_POST['misi_paslon']."'
            WHERE id_paslon='".$_POST['id_paslon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_paslon SET
            nama_paslon='".$_POST['nama_paslon']."',
            nama_wakil='".$_POST['nama_wakil']."',
            foto_paslon='".$nama_file."',
            visi_paslon='".$_POST['visi_paslon']."',
           	misi_paslon='".$_POST['misi_paslon']."'
            WHERE id_paslon='".$_POST['id_paslon']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-paslon';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-paslon';
            }
        })</script>";
    }
}

