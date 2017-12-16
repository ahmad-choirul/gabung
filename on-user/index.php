<!DOCTYPE html>
<?php

include '../config.php';
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
	( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'user' ) ) {

	header('location:./../login.php');
exit();
}
$sql = "SELECT * FROM `tugas` WHERE `iduser` = " . $_SESSION["id_user"] . "";
$result = mysqli_query($db_link, $sql);
$jumlahtugastotal = mysqli_num_rows ($result);
$sql2 = "SELECT idtugas,judul, isi, deadline FROM tugas where iduser = " . $_SESSION["id_user"] . " and  (deadline>=CURRENT_DATE) ";
$result2 = mysqli_query($db_link, $sql2);
$jumlahtugas = mysqli_num_rows ($result2);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>beranda user</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">C I L O K <h5>(cariin kelompok)</h5></a>
			</div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"> selamat datang <?=$_SESSION['nama'];?> <br> <?=$_SESSION['nim'];?> </div><div style="float: right;"><a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
		</nav>   
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="assets/img/logo.png" style="max-width: 100px; width: 100%; max-height: 100px; width: 100%;" class="user-image img-responsive"/>
					</li>
					<li>
						<a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
					</li>
					<li>
						<a  href="user_kelas.php"><i class="fa fa-desktop fa-3x"></i> Kelas</a>
					</li>
					<li>
						<a  href="user_asistensi.php"><i class="fa fa-qrcode fa-3x"></i> Asistensi</a>
					</li>
					<li>
						<a  href="user_tugas.php"><i class="fa fa-edit fa-3x"></i> Tugas </a>
					</li>				
					<li  >
						<a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="#">Second Level Link</a>
							</li>
							<li>
								<a href="#">Second Level Link</a>
							</li>
							<li>
								<a href="#">Second Level Link<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li>
										<a href="#">Third Level Link</a>
									</li>
									<li>
										<a href="#">Third Level Link</a>
									</li>
									<li>
										<a href="#">Third Level Link</a>
									</li>

								</ul>

							</li>
						</ul>
					</li>  
					<li  >
						<a  href="blank.php"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
					</li>	
				</ul>

			</div>

		</nav>  
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper" >
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h2>BERANDA USER</h2>   
						<h5>selamat datang <?=$_SESSION['nama'];?> </h5>
					</div>
				</div>              
				<!-- /. ROW  -->
				<hr />
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red set-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<div class="text-box" >
								<p class="main-text">1 pesan</p>
								<p class="text-muted">PESAN</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green set-icon">
								<i class="fa fa-bars"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"> <?=$jumlahtugastotal;?> tugas</p>
								<p class="text-muted">TUGAS TOTAL</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue set-icon">
								<i class="fa fa-bell-o"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"><?=$jumlahtugas;?> tugas</p>
								<p class="text-muted">TUGAS DEADLINE</p>
							</div>
						</div>
					</div>

				</div>
				<!-- /. ROW  -->
				<hr />
				<?php 
				$sql = "SELECT idtugas,judul, isi, deadline FROM tugas where iduser = " . $_SESSION["id_user"] . " and  (deadline>=CURRENT_DATE) order by deadline desc limit 3;";
				$result = mysqli_query($db_link, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo '<div class="col-md-4 col-sm-4">
						<div class="panel panel-danger">
						<div class="panel-heading" style="background-color: #c90000; color: white">
						<div class="fa fa-exclamation-triangle" aria-hidden="true" >  '. $row["judul"]. ' </div>
						</div>
						<div class="panel-body">
						<p> ' . $row["isi"]. ' </p>
						</div>
						<div class="panel-footer">
						deadline : ' . $row["deadline"]. ' 
						</div>
						</div>
						</div> ' ;     
					}
				}
				?>
				<!-- /. ROW  -->
			</div>

			<!-- /. WRAPPER  -->
			<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
			<!-- JQUERY SCRIPTS -->
			<script src="assets/js/jquery-1.10.2.js"></script>
			<!-- BOOTSTRAP SCRIPTS -->
			<script src="assets/js/bootstrap.min.js"></script>
			<!-- METISMENU SCRIPTS -->
			<script src="assets/js/jquery.metisMenu.js"></script>
			<!-- MORRIS CHART SCRIPTS -->
			<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
			<script src="assets/js/morris/morris.js"></script>
			<!-- CUSTOM SCRIPTS -->
			<script src="assets/js/custom.js"></script>


		</body>
		</html>
