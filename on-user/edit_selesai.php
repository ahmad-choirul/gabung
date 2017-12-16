<?php
include('../config.php');

$idtugas		= $_GET['idtugas'];
$selesai		= $_GET['selesai'];
echo($idtugas);
if($selesai==0){ 
$sqlselesai	= 'UPDATE `tugas` SET `selesai`=1 WHERE idtugas = "'.$idtugas.'"';
$query	= mysqli_query($db_link,$sqlselesai);
echo $sqlselesai;

if($query){
		//header('location: listtugas.php'); 
	}
	else{
		echo 'Gagal';
	}
}

if($selesai==1){ 
$sqlselesai	= 'UPDATE `tugas` SET `selesai`=0 WHERE idtugas = "'.$idtugas.'"';
$query	= mysqli_query($db_link,$sqlselesai);
echo $sqlselesai;

if($query){
		//header('location: listtugas.php'); 
	}
	else{
		echo 'Gagal';
	}
}

?>