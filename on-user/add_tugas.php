<?php 
include'../config.php';
session_start();
$judul = $_POST['judul'];
$isi =$_POST['isi'];
$deadline =$_POST['deadline'];
mysqli_query($db_link,"insert into tugas(judul,isi,deadline,iduser) values ('$judul','$isi','$deadline'," . $_SESSION["id_user"] .")");
header('location:user_tugas.php');
?>