<!DOCTYPE html>
<?php
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
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blank Website</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
    function edt_id(id)
        {
           if(confirm('Apakah data akan diubah ?'))
           {
              window.location.href='edit_selesai.php?edit_id='+id;
          }
      }
  }
</script>
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
                        <a href="user_kelas.php"><i class="fa fa-desktop fa-3x"></i> Kelas</a>
                    </li>
                    <li>
                        <a href="user_asistensi.php"><i class="fa fa-qrcode fa-3x"></i> Asistensi</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="user_tugas.php"><i class="fa fa-edit fa-3x"></i> Tugas </a>
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
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                   Daftar Tugas melebihi deadline
               </div>
               <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" >
                    <thead>
                      <tr >
                        <td style="width: 25px; background-color:  #8B0000; color: white;">No.</td>
                        <td style="width: 100px; background-color:  #8B0000; color: white;"th>judul</td>
                        <td style="width: 250px; background-color:  #8B0000; color: white;"th>isi</td>
                        <td style="width: 50px; background-color:  #8B0000; color: white;"th>deadline</td>
                        <td style="width: 25px;background-color:  #8B0000; color: white;"th>aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../config.php';
                    $no = 1;
                    $sqlbarang = mysqli_query($db_link,"select * from tugas where `deadline`<=CURRENT_DATE and selesai=0 order by deadline asc;");
                    while ($data = mysqli_fetch_array($sqlbarang)){
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['judul'] ?></td>
                            <td><?php echo $data['isi'] ?></td>
                            <td><?php echo $data['deadline'] ?></td>
                            <td>
                                <a href="edit_selesai.php?idtugas=<?php echo $data['idtugas'] & $data['selesai']; ?>" class='btn btn-warning '><span class="glyphicon glyphicon-check" aria-hidden="true" value="Editselesai"></span></a>

                                <a href="proses_edit_tugas.php?idtugas=<?php echo $data['idtugas']; ?>" class='btn btn-warning '><span class="glyphicon glyphicon-pencil"></span></a>

                                <a href="delete_tugas.php?idtugas=<?php echo $data['idtugas'];?>" onclick="return confirm('Yakin mau di hapus?');" class='btn btn-danger'><span class="glyphicon glyphicon-trash"></span></a>
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
    <hr>
    <br>
    <div class="panel panel-default">
      <div class="panel-heading">
       Daftar Tugas sebelum deadlinetes
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" >
        <thead>
          <tr >
            <td style="width: 25px; background-color:  #FFBF00; color: white;">No.</td>
            <td style="width: 100px; background-color:  #FFBF00; color: white;"th>judul</td>
            <td style="width: 250px; background-color:  #FFBF00; color: white;"th>isi</td>
            <td style="width: 50px; background-color:  #FFBF00; color: white;"th>deadline</td>
            <td style="width: 25px;background-color:  #FFBF00; color: white;"th>aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sqlbarang = mysqli_query($db_link,"select * from tugas where `deadline`>=CURRENT_DATE and selesai=0 order by deadline asc;");
        while ($data = mysqli_fetch_array($sqlbarang)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['judul'] ?></td>
                <td><?php echo $data['isi'] ?></td>
                <td><?php echo $data['deadline'] ?></td>
                <td>
                    <a href="javascript:edt_id('<?php echo $data['idtugas']; ?>')"><span class="glyphicon glyphicon-check" aria-hidden="true" value="Editselesai"></span></a>

                    <a href="proses_edit_tugas.php?idtugas=<?php echo $data['idtugas']; ?>" class='btn btn-warning '><span class="glyphicon glyphicon-pencil"></span></a>

                    <a href="delete_tugas.php?idtugas=<?php echo $data['idtugas'];?>" onclick="return confirm('Yakin mau di hapus?');" class='btn btn-danger'><span class="glyphicon glyphicon-trash"></span></a>
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
<br>
<div class="panel panel-default">
  <div class="panel-heading">
   Daftar Tugas selesai
</div>
<div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" >
        <thead>
          <tr >
            <td style="width: 25px; background-color:  skyblue; color: black;">No.</td>
            <td style="width: 100px; background-color:  skyblue; color: black;"th>judul</td>
            <td style="width: 250px; background-color:  skyblue; color: black;"th>isi</td>
            <td style="width: 50px; background-color:  skyblue; color: black;"th>deadline</td>
            <td style="width: 25px;background-color:  skyblue; color: black;"th>aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sqlbarang = mysqli_query($db_link,"select * from tugas where selesai=1 order by deadline asc;");
        while ($data = mysqli_fetch_array($sqlbarang)){
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['judul'] ?></td>
                <td><?php echo $data['isi'] ?></td>
                <td><?php echo $data['deadline'] ?></td>
                <td>
                    <a href="edit_selesai.php?idtugas=<?php echo $data['idtugas'] & $data['selesai']; ?>" class='btn btn-warning '><span class="glyphicon glyphicon-check" aria-hidden="true" value="Editselesai"></span></a>

                    <a href="proses_edit_tugas.php?idtugas=<?php echo $data['idtugas']; ?>" class='btn btn-warning '><span class="glyphicon glyphicon-pencil"></span></a>

                    <a href="delete_tugas.php?idtugas=<?php echo $data['idtugas'];?>" onclick="return confirm('Yakin mau di hapus?');" class='btn btn-danger'><span class="glyphicon glyphicon-trash"></span></a>
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

<!-- /. ROW  -->
<hr />

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<div id="ModalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $(".open_modal").click(function (e){
            var m = $(this).attr("id");
            $.ajax({
                url: "tugas_edit.php",
                type: "GET",
                data : {judul: m,},
                success: function (ajaxData){
                    $("#ModalEdit").html(ajaxData);
                    $("#ModalEdit").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $(".open_delete").click(function (e){
            var m = $(this).attr("id");
            $.ajax({
                url: "tugas_delete.php",
                type: "GET",
                data : {kdbarang: m,},
                success: function (ajaxData){
                    $("#ModalDelete").html(ajaxData);
                    $("#ModalDelete").modal('show',{backdrop: 'true'});
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#form-save')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Nama Barang tidak boleh kosong'
                        },
                        stringLength: {
                            min: 5,
                            max: 30,
                            message: 'Panjang minimal 5 karakter dan panjang maksismu 30 karakter'
                        }
                    }
                }, 
                jumlah: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Jumlah Barang tidak boleh kosong'
                        },
                        digits: {
                            message: 'anda harus memasukkan angka'
                        }
                    }
                }
            }
        });
    });
</script>
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