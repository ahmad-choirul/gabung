<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'dbcilok');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$db_link	= mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
