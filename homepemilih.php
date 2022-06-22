<a href="index.php"><h5>Dashboard</h5></a>
<?php
// menghitung jumlah calon 
  $sql = $koneksi->query("SELECT COUNT(id_paslon) as tot_calon  from tb_paslon");
  while ($data= $sql->fetch_assoc()) {
    $calon=$data['tot_calon'];
  }
// menghitung total pemilih 
  $sql = $koneksi->query("SELECT COUNT(iduser) as tot_pemilih  from tb_user where level='pemilih'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }
//   menghitung pemilih yang sudah memilih 
  $sql = $koneksi->query("SELECT COUNT(iduser) as sudah  from tb_user where level='pemilih' and status='0'");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }
// menghitung pemilih belum memilih 
  $sql = $koneksi->query("SELECT COUNT(iduser) as belum  from tb_user where level='pemilih' and status='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
        <!-- menampilkan jumlah kandidat  -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo $calon; ?>
				</h5>

				<p>Jumlah Kandidat</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a class="small-box-footer">
				<i class="fas"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
        <!-- menampilkan jumlah pemilih  -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo $pemilih; ?>
				</h5>

				<p>Jumlah Pemilih</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">
				<i class="fas"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
        <!-- menampilkan pemilih sudah memilih  -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $sudah; ?>
				</h5>

				<p>Sudah Memilih</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">
				<i class="fas"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
        <!-- menampilkan pemilih belum memilih  -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5>
					<?php echo $belum; ?>
				</h5>

				<p>Belum Memlih</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="#" class="small-box-footer">
				<i class="fas"></i>
			</a>
		</div>
	</div>