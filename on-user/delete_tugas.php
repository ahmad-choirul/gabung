<?php
include('../config.php');

$idtugas	= $_GET['idtugas'];

$sql 	= 'DELETE FROM `tugas` WHERE `idtugas` = "'.$idtugas.'"';
$query	= mysqli_query($db_link,$sql);
header('location: user_tugas.php');
?>