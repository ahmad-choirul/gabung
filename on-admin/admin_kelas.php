<!DOCTYPE html>
<?php
require '../config.php';
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
  ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

  header('location:./../login.php');
exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>admin Asisten</title>
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
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">C I L O K <h5>(cariin kelompok)</h5></a>
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;">selamat datang <?=$_SESSION['nama'];?> <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="assets/img/logo.png" style="max-width: 100px; width: 100%; max-height: 100px; width: 100%;" class="user-image img-responsive"/>
          </li>
          <li>
            <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
          </li>
          <li>
            <a class="active-menu" href="admin_kelas.php"><i class="fa fa-desktop fa-3x"></i> Kelas</a>
          </li>
          <li>
            <a href="admin_asisten.php"><i class="fa fa-qrcode fa-3x"></i> Asistens</a>
          </li>
          <li>
            <a href="admin_peserta.php"><i class="fa fa-edit fa-3x"></i> Peserta </a>
          </li>       
          <li>
            <a href="tambah_user.php"><i class="fa fa-users fa-3x"></i> pengguna </a>
          </li>     
          <li>
            <a href="#"><i class="fa fa-sitemap fa-3x"></i> Kelompok<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="admin_buatkelompok.php">buat kelompok</a>
              </li>
              <li>
                <a href="admin_lihatkelompok.php">lihat data kelompok</a>
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
           <h2>Blank Page</h2>   
           <h5>Selamat datang <?=$_SESSION['nama'];?> </h5>
         </div>
       </div>
       <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" ">
            tambah kelas
          </button>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                </div>
                <div class="modal-body">
                  <form method="POST" action="add_kelas.php">
                    <label>id_kelas</label>
                    <input type="text" name="id_kelas" id="id_kelas" readonly="" class="form-control" />
                    <br />
                    <label>nama_kelas</label>
                    <textarea name="nama_kelas" id="nama_kelas" class="form-control"></textarea>
                    <br />

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
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
           Daftar kelas
         </div>
         <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover" >
            <thead>
              <tr >
                <td style="width: 25px; background-color: skyblue">No.</td>
                <td style="width: 100px; background-color: skyblue"th>id_kelas</td>
                <td style="width: 200px; background-color: skyblue"th>nama_kelas</td>
                <td style="width: 30px; background-color: skyblue"th>aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $sql = mysqli_query($db_link,"select * from kelas;");
              while ($data = mysqli_fetch_array($sql)){
                ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data['id_kelas'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>
                  <td>
                    <a href="edit_kelas.php?id_kelas=<?php echo $data['id_kelas']; ?>" class='btn btn-warning ' ><span class="glyphicon glyphicon-pencil"></span></a>

                    <a href="proses delete.php?id_kelas=<?php echo $data['id_kelas'];?>" onclick="return confirm('Yakin mau di hapus?');" class='btn btn-danger '><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /. ROW  -->
  <hr />

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

</body>
</html>
