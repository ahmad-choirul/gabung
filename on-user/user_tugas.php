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
?>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Cariin Kelompok cyin</title>
	<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
	
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
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
					<span class="icon-bar">TOGEL</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">C I L O K <h5>(cariin kelompok)</h5></a>
			</div>
			<div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;">selamat datang
			<?=$_SESSION['nama'];?> <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="assets/img/logo.png" style="max-width: 100px; width: 100%; max-height: 100px; width: 100%;" class="user-image img-responsive" />
					</li>
					<li>
						<a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
					</li>
					<li>
						<a  href="user_kelas.php"><i class="fa fa-desktop fa-3x"></i> Kelas</a>
					</li>
					<li>
						<a href="user_asistensi.php"><i class="fa fa-qrcode fa-3x"></i> Asistensi</a>
					</li>
					<li>
						<a class="active-menu" href="user_tugas.php"><i class="fa fa-edit fa-3x"></i> Tugas </a>
					</li>
					<li>
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
					<li>
						<a href="blank.php"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
					</li>
				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h2>Blank Page</h2>
						<h5>selamat datang <?=$_SESSION['nama'];?> </h5>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
						</div>
						<div class="panel-body">
							<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" ">
								tambah tugas
							</button>
							<a href="listtugas.php"><button class="btn btn-primary btn-lg">
								update tugas
							</button></a>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Tugas User</h4>
										</div>
										<div class="modal-body">Tugas <br>
										
											<form method="POST" action="add_tugas.php">
												<label>judul</label>
												<input type="text" name="judul" id="name" class="form-control" />
												<br />
												<label>isi</label>
												<textarea name="isi" id="address" class="form-control"></textarea>
												<br />
												<label>tanggal deadline</label>
												<td><input type="date" name="deadline" id="tanggal" class="form-control"/></td>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-success">Save changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php 
					$sql = "SELECT idtugas,judul, isi, deadline FROM tugas where iduser = " . $_SESSION["id_user"] . " and  (deadline>=CURRENT_DATE) order by deadline asc;";
					$result = mysqli_query($db_link, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo '<div class="col-md-4 col-sm-4">
							<div class="panel panel-danger">
							<div class="panel-heading" style="background-color: #c90000; color: white">
							<div class="fa fa-exclamation-triangle" aria-hidden="true" >  '.' '. $row["judul"]. ' </div>
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


				</div>
				<!-- /. ROW  -->
				<hr />
				<div class="row">
					<?php 
					$sql = "SELECT judul, isi, deadline FROM tugas where iduser = " . $_SESSION["id_user"] . " and  (deadline<CURRENT_DATE )order by deadline asc;";
					$result = mysqli_query($db_link, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo '<div class="col-md-4 col-sm-4">
							<div class="panel panel-danger">
							<div class="panel-heading" style="background-color: green; color: white">
							<div class="fa  fa-check-circle " aria-hidden="true" >  '.' '. $row["judul"]. ' </div>
							</div>
							<div class="panel-body">
							<p> ' . $row["isi"]. ' </p>
							</div>
							<div class="panel-footer">
							deadline : ' . $row["deadline"]. '
							<span class="glyphicon glyphicon-history" style="font-size:18px; color:Green"></span>
							</div>
							</div>
							</div> ' ;     
						}

					} 
					?>
				</div>

			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
	<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
	<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
	<script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">

</body>

</html>