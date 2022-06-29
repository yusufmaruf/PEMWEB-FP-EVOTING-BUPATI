<?php
// menampung session id 
$data_id = $_SESSION["ses_id"];

    if(isset($_GET['kode'])){
		// query simpan ke tb vote 
		$sql_simpan = "INSERT INTO tb_vote (id_paslon, iduser) VALUES (
            '".$_GET['kode']."',
            '".$data_id."');";
		// query update ke tbuser 
        $sql_simpan .= "UPDATE tb_user set 
			status='0'
			WHERE iduser='".$data_id."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);
		
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Selamat, Anda Berhasil Memilih!',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=info';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Mohon Maaf, Anda Gagal Memilih!',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=dpt-datakandidat';
				}
			})</script>";
		  }}
		   //selesai proses simpan data
	  