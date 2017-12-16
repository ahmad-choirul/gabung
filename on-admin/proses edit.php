<?php
include('../config.php');


if(!isset($_POST['Edit'])){ 
	$id_kelas		= $_POST['id_kelas'];
	$nama_kelas		= $_POST['nama_kelas'];

$sql	= 'update kelas set nama_kelas="'.$nama_kelas.'" where id_kelas="'.$id_kelas.'"';
$query	= mysqli_query($db_link,$sql);

if($query){
		header('location: admin_kelas.php'); 
	}
	else{
		echo 'Gagal';
	}
}
?>

