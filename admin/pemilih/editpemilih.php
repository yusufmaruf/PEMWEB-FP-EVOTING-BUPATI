<?php
    // mengambil kode user yang di edit 
    if(isset($_GET['kode'])){
        // mengambil data dari db 
        $sql_cek = "SELECT * FROM tb_user WHERE iduser='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
    <!-- form  -->
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['iduser']; ?>"
			 readonly/>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['namauser']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>"
                    />
                    <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                </div>
            </div>

		</div>
		<div class="card-footer">
            <!-- submit button  -->
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <!-- batal button  -->
			<a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php
    // cek form terisi apa belum 
    if (isset ($_POST['Ubah'])){
        // query update 
    $sql_ubah = "UPDATE tb_user SET
        nik='".$_POST['nik']."',
        namauser='".$_POST['nama_pengguna']."',
        password='".$_POST['password']."'
        WHERE iduser='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    // close koneksi 
    mysqli_close($koneksi);


    if ($query_ubah) {
        // show alerrt success 
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
      }else{
        // show alert gagal
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
    }}
?>

<!-- show password  -->
<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'kode_akses')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'kode_akses';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>