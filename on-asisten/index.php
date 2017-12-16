﻿<!DOCTYPE html>
<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
	( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'asisten' ) ) {

	header('location:./../login.php');
exit();
}
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
			font-size: 16px;"> selamat datang <?=$_SESSION['nama'];?> <br> nim = <?=$_SESSION['nim'];?>  </div>
			<div class="navbar-right"><a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a></div>
		</nav>   
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="assets/img/logo.png" style="max-width: 100px; width: 100%; max-height: 100px; width: 100%;" class="user-image img-responsive"/>
					</li>
					<li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="asisten_kelas.php"><i class="fa fa-desktop fa-3x"></i> Kelas</a>
                    </li>
                    <li>
                        <a href="asisten_asistensi.php"><i class="fa fa-qrcode fa-3x"></i> Asistensi</a>
                    </li>
                    <li>
                        <a href="asisten_tugas.php"><i class="fa fa-edit fa-3x"></i> Tugas </a>
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
							<h2>BERANDA ASSSITEN</h2>   
							<h5>selamat datang <?=$_SESSION['nama'];?> </h5>
						</div>
					</div>              
					<!-- /. ROW  -->
					<hr />
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-6">           
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-red set-icon">
									<i class="fa fa-envelope-o"></i>
								</span>
								<div class="text-box" >
									<p class="main-text">1 pesan</p>
									<p class="text-muted">TUGAS</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">           
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-green set-icon">
									<i class="fa fa-bars"></i>
								</span>
								<div class="text-box" >
									<p class="main-text">3 tugas</p>
									<p class="text-muted">TUGAS</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">           
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-blue set-icon">
									<i class="fa fa-bell-o"></i>
								</span>
								<div class="text-box" >
									<p class="main-text">catatan</p>
									<p class="text-muted">TUGAS</p>
								</div>
							</div>
						</div>

					</div>
					<!-- /. ROW  -->
					<hr />               
					<!-- /. ROW  -->
					<div class="col-md-9 col-sm-12 col-xs-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								Responsive Table Example
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Username</th>
												<th>User No.</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
												<td>100090</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
												<td>100090</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Larry</td>
												<td>the Bird</td>
												<td>@twitter</td>
												<td>100090</td>
											</tr>
											<tr>
												<td>1</td>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
												<td>100090</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
												<td>100090</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Larry</td>
												<td>the Bird</td>
												<td>@twitter</td>
												<td>100090</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>

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
