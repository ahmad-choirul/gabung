<?php
include('../config.php'); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>tugas</title>
 <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <link href="assets/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="assets/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
</head>

<body>
  <?php
    if(isset($_GET['idtugas'])){
      $id_tugas   = $_GET['idtugas'];
      $query  = mysqli_query($db_link,'select * from tugas where idtugas = "'.$id_tugas.'"');
      $data   = mysqli_fetch_array($query);
      $judul = $data['judul'];
      $isi = $data['isi'];
      $deadline  = $data['deadline'];
    }
    else{
      $judul = '';
      $isi = '';
      $deadline = '';
    }
  ?>


  <h2><strong><p align="center">Edit Data tugas</p></strong></h2>

  <div class="col-md-8 col-md-offset-2 ">
    <form method="POST" action="edit_tugas.php"> 
    <hr>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>id tugas</label>
            <input type="text" class="form-control border-input" name="idtugas" value="<?php echo $_GET['idtugas']; ?>" readonly="readonly">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>judul</label>
            <input type="text" class="form-control border-input" name="judul" value="<?php echo $judul; ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>isi</label>
            <input type="text" class="form-control border-input" name="isi" value="<?php echo $isi; ?>">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Jenis deadline</label>
            <input type="date" class="form-control border-input" name="deadline" value="<?php echo $deadline; ?>">
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
