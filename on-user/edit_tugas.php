<?php
include('../config.php');

if(!isset($_POST['Edit'])){ 
	$idtugas		= $_POST['idtugas'];
	$judul		= $_POST['judul'];
	$isi		= $_POST['isi'];
	$deadline	= $_POST['deadline'];
echo "$deadline";
$sql	= 'update tugas set judul="'.$judul.'",isi="'.$isi.'",deadline="'.$deadline.'" where idtugas="'.$idtugas.'"';
$query	= mysqli_query($db_link,$sql);

if($query){
		header('location: user_tugas.php'); 
	}
	else{
		echo 'Gagal';
	}
}
?>