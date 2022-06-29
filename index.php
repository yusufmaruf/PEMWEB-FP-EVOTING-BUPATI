<?php 
include "koneksi.php";
ob_start();
session_start();
if (isset($_SESSION["ses_nik"])==""){
	header("location: login.php");
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
      $data_user = $_SESSION["ses_nik"];
	    $data_level = $_SESSION["ses_level"];
      $data_status = $_SESSION["ses_status"];
      $data_jenis = $_SESSION["ses_jenis"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PEMILU KAB PASURUAN | Dashboard</title>
  <!-- keperluan  -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Auto Refresh -->
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
	<script>
    // ngeload aplikasi 
		setInterval(function() {
			$(".realtime").load("admin/perolehansuara/data_suara.php").fadeIn("slow");
		}, 10000);
	</script>


</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/download.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   
      <li class="dropdown user user-menu nav-item  d-none d-sm-inline-block">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="dist/img/AdminLTELogo.png" class="user-image">
          <span class="hidden-xs "> <?php echo $data_nama; ?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="dist/img/avatar.png" class="img-circle">
            <p>  <?php echo $data_level ?>
              <small> <?php echo $data_user ?> </small>
            </p>
          </li>
          <!-- menu sign out  -->
          <li class="user-footer">
            <div class="float-right">
              <a href="logout.php" class="btn btn-flat bg-red">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/download.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">Pemkab. Pasuruan </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- autentikasi level user  -->
        <?php
          if ($data_level=="admin"){
        ?>
          <!-- menu dahboard  -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- menu master data  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <!-- data kandidat  -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=data-paslon" class="nav-link">
                  <i class="nav-icon  far fa-solid fa-user text-success"></i>
                  <p>Data Paslon</p>
                </a>
              </li>
              <!-- data pemilih  -->
              <li class="nav-item">
                <a href="?page=data-pemilih" class="nav-link">
                  <i class="nav-icon far fa-solid fa-user text-success"></i>
                  <p>Data Pemilih</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- quick account  -->
          <li class="nav-item">
            <a href="?page=data-suara" class="nav-link">
              <i class="nav-icon far fa fa-chart-pie"></i>
              <p>
                <span class="badge badge-warning">
                  Quick Count
                </span>
              </p>
            </a>
          </li>
          <!-- data  -->
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-solid fa-database"></i>
								<p>
									DATA PEMILU
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
                <!-- daftar paslon  -->
								<li class="nav-item">
									<a href="?page=daftar-paslon" class="nav-link">
										<i class="nav-icon far fa-solid fa-user text-info"></i>
										<p>Daftar Paslon</p>
									</a>
								</li>
                <!-- daftar pemilih  -->
								<li class="nav-item">
									<a href="?page=daftar-pemilih" class="nav-link">
										<i class="nav-icon far fa-solid fa-user text-info"></i>
										<p>Daftar Pemilih</p>
									</a>
								</li>
							</ul>
						</li>
          <!-- GRAFIK            -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-chart-line"></i>
              <p>
                Grafik Hasil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- bar chart  -->
              <li class="nav-item">
                <a href="?page=bar-chart" class="nav-link">
                  <i class="far nav-icon fa-solid fa-chart-bar text-info"></i>
                  <p>Bar Chart</p>
                </a>
              </li>
              <!-- pie chart  -->
              <li class="nav-item">
                <a href="?page=pie-chart" class="nav-link">
                  <i class="far fa fa-chart-pie nav-icon  text-info"></i>
                  <p>Pie Chart</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- print data  -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <!-- menu data paslon  -->
              <li class="nav-item">
                <a href="?page=cetak-paslon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Paslon</p>
                </a>
              </li>
              <!-- menu data pemilih  -->
              <li class="nav-item">
                <a href="?page=cetak-pemilih" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pemilih</p>
                </a>
              </li>
              <!-- menu suara  -->
              <li class="nav-item">
                <a href="?page=cetak-suara" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Suara</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Pengaturan</li>
          <!-- pengguna  -->
          <li class="nav-item">
            <a href="?page=data-pengguna" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Pengguna
               
              </p>
            </a>
          </li>
        <?php
        } elseif($data_level=="pemilih"){
        ?>
        <!-- bilik suara  -->
        <li class="nav-item">
							<a href="?page=dpt-datakandidat" class="nav-link">
								<i class="nav-icon far fa fa-edit"></i>
								<p>
									Bilik Suara
								</p>
							</a>
				</li>
        <?php
							}
				?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		</section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- web dinamis disini  -->
        <?php
        // pengecekan klik oleh user 
        if(isset($_GET['page'])){
          $hal = $_GET['page'];

          switch($hal){

            // klik halaman home 
            case 'admin':
              include "homeadmin.php";
              break;
            case 'pemilih':
              include "homepemilih.php";
              break;
            
            // klik menu pengguna 
            case 'data-pengguna':
              include "admin/pengguna/datapenguna.php";
              break;
            case 'add-pengguna':
              include "admin/pengguna/addpengguna.php";
              break;
            case 'del-pengguna':
              include "admin/pengguna/delpengguna.php";
              break;
            case 'edit-pengguna':
              include "admin/pengguna/editpengguna.php";
              break;
              
            //data
            case 'daftar-pemilih':
              include "admin/data/datapemilih.php";
              break;
              case 'daftar-paslon':
                include "admin/data/datapaslon.php";
                break;
                        
            //paslon
             case 'data-paslon':
              include "admin/paslon/datapaslon.php";
              break;
            case 'add-paslon':
              include "admin/paslon/addpaslon.php";
              break;
            case 'del-paslon':
              include "admin/paslon/delpaslon.php";
              break;
            case 'edit-paslon':
              include "admin/paslon/editpaslon.php";
              break;
            //pemilih
            case 'data-pemilih':
              include "admin/pemilih/datapemilih.php";
              break;
            case 'add-pemilih':
              include "admin/pemilih/addpemilih.php";
              break;
            case 'del-pemilih':
              include "admin/pemilih/delpemilih.php";
              break;
            case 'edit-pemilih':
              include "admin/pemilih/editpemilih.php";
              break;
            //bilik suara
            case 'dpt-datakandidat':
              include "pemilih/datapaslon.php";
              break;
            case 'dpt-pilihkandidat':
              include "pemilih/pilihpaslon.php";
              break;
            // case 'dpt-bukakandidat':
            //           include "pemilih/bukapaslon.php";
            //   break;
            case 'view-kandidat':
                      include "pemilih/lihatpaslon.php";
              break;
            case 'info':
              include "pemilih/info.php";
              break;
            //quickaccount
            case 'data-suara':
              include "admin/perolehansuara/datasuara.php";
              break;
            //cetak data
            case 'cetak-suara':
              include "admin/cetak/cetaksuara.php";
              break;
            case 'cetak-pemilih':
              include "admin/cetak/cetakpemilih.php";
              break;
            case 'cetak-paslon':
              include "admin/cetak/cetakpaslon.php";
              break;
            //grafik
            case 'bar-chart':
              include "admin/grafik/barchart.php";
              break;
            case 'pie-chart':
              include "admin/grafik/piechart.php";
              break;
            //default
            default:
              echo "<center><h1> ERROR!</h1></center>";
              break;    
            
          }
        }else{
          // jika admin masuk maka menampilkan home admin 
          if($data_level=="admin"){
              include "homeadmin.php";
              }
          // jika login sebagai pemilih maka menampilkan home pemilih 
          elseif($data_level=="pemilih"){
              include "homepemilih.php";
              }
        }
        ?>
        
       
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer  -->
  <footer class="main-footer">
    <strong>Copyright &copy; 20082010148 || 20082010127</strong>
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- script page  -->
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


<script>
  // fungsi datatable untuk table di dokumen 
		$(function() {
      // menerapkan datatable pada table yang dipilih
			$("#example1").DataTable();
      // menerapkan datatable pada table yang dipilih
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>
	



</body>
</html>
