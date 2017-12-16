<?php
session_start();
require 'config.php';

if ( isset($_POST['nim']) && isset($_POST['password']) ) {

  $sql_check = "SELECT nama, 
  level_user, 
  id_user 
  FROM users 
  WHERE 
  nim=? 
  AND 
  password=? 
  LIMIT 1";

  $check_log = $dbconnect->prepare($sql_check);

  $check_log->bind_param('ss', $nim, $password);

  $nim = $_POST['nim'];
  $password = $_POST['password'];

  $check_log->execute();

  $check_log->store_result();

  if ( $check_log->num_rows == 1 ) {
    $check_log->bind_result($nama, $level_user, $id_user);

    while ( $check_log->fetch() ) {
      $_SESSION['user_login'] = $level_user;
     $_SESSION['id_user']    = $id_user;
      $_SESSION['nama']       = $nama;
      $_SESSION['nim']        = $nim;
    }

    $check_log->close();
    header('location:on-'.$level_user);
    exit();

  } else {
    header('location: login.php?error='.base64_encode('nim dan Password salah mohon cek kembali!!!'));
    exit();
  }


} else {
  header('location:login.php');
  exit();
}