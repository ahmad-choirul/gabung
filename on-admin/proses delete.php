<?php
include('../config.php');

$id_kelas	= $_GET['id_kelas'];

$sql 	= 'DELETE FROM `kelas` WHERE `id_kelas` ="'.$id_kelas.'"';
$query	= mysqli_query($db_link,$sql);
header('location: admin_kelas.php');
?>