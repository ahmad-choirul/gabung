<?php 
include'../config.php';
session_start();
$id_kelas = $_POST['id_kelas'];
$nama_kelas =$_POST['nama_kelas'];
mysqli_query($db_link,"INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES (NULL, '$nama_kelas')");
header('location:admin_kelas.php');
?>