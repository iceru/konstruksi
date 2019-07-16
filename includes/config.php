<?php
/** Koneksi ke Basis Data, dengan nama file config.php **/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konstruksi";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) 
{ 
	die ("Connection Failed : ".mysqli_connect_error());
}