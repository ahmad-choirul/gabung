<?php
include('../config.php'); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Anggota</title>
 <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>

<body>
  <?php
    if(isset($_GET['id_kelas'])){
      $id_kelas   = $_GET['id_kelas'];
      $query  = mysqli_query($db_link,'select * from kelas where id_kelas = "'.$id_kelas.'"');
      echo "$id_kelas";
      $data   = mysqli_fetch_array($query);
      $nama_kelas = $data['nama_kelas'];
    }
    else{
      $nama_kelas = '';
    }
  ?>


  <h2><strong><p align="center">Edit Data kelas</p></strong></h2>

  <div class="col-md-8 col-md-offset-2 ">
    <form method="POST" action="proses edit.php"> 
    <hr>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>id_kelas</label>
            <input type="text" class="form-control border-input" name="id_kelas" value="<?php echo $_GET['id_kelas']; ?>" readonly="readonly">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama kelas</label>
            <input type="text" class="form-control border-input" name="nama_kelas" value="<?php echo $nama_kelas; ?>">
          </div>
        </div>
      </div>

      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Edit" name="submit">
          </div>
        </div>
      </div>
    </form>
  </div>

</body>
</html>
