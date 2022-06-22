<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E VOTING | Log in</title>
	<link rel="icon" href="dist/img/himasifo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="dist/img/download.png" width=100px height= 120 px />
			<br>
			<a href="login.php">
				Aplikasi
				<b>E-Voting </b>
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Pemilu Kab. Pasuruan</p>

				<form action="" method="post">

					<!-- form npm  -->
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK..." required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>

					<!-- form kode akses  -->
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<!-- button  -->
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-warning btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Masuk</b>
							</button>
						</div>
					</div>
				</form>

				</div>
			</div>
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>
</body>
</html>

<?php  
	if (isset($_POST['btnLogin'])) {  
		//anti inject sql
		$nik=mysqli_real_escape_string($koneksi,$_POST['nik']);
		$kode_akses=mysqli_real_escape_string($koneksi,$_POST['password']);

		//menegcek inputan pada database
		$sql_login = "SELECT * FROM tb_user WHERE nik='$nik' AND password='$kode_akses'";
		//menjalankan query
		$query_login = mysqli_query($koneksi, $sql_login);
		// menampung hasil query 
		$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
		//menghitung baris pada variabel logi
		$jumlah_login = mysqli_num_rows($query_login);
		// melakukan pengecekan 
		if ($jumlah_login ==1 ){
			// memulai sesiion 
			session_start();
			// pengisian nilai var pada session 
			$_SESSION["ses_id"]=$data_login["iduser"];
			$_SESSION["ses_nama"]=$data_login["namauser"];
			$_SESSION["ses_nik"]=$data_login["nik"];
			$_SESSION["ses_kode_akses"]=$data_login["password"];
			$_SESSION["ses_level"]=$data_login["level"];
			$_SESSION["ses_status"]=$data_login["status"];
			$_SESSION["ses_jenis"]=$data_login["jenis"];
			
			// menampilkan alert succes 
			echo "<script>
				Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'index.php';}
				})</script>";
			}else{
				// menampilkan alert login gagal 
			echo "<script>
				Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'login.php';}
				})</script>";
			}
		}
	
?>